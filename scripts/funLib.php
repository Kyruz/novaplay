<?php
/*--- Create and configure an HTMLPurifier onject ---*/
if((include "./scripts/HTMLPurifierLib/HTMLPurifier.auto.php") || (include "./HTMLPurifierLib/HTMLPurifier.auto.php")){
    $purifConf = HTMLPurifier_Config::createDefault();
    $purifConf->set('Core.Encoding','UTF-8');
    $purifConf->set('HTML.Doctype','XHTML 1.0 Transitional');
    $purifier = new HTMLPurifier($purifConf);
    //echo "<br>HTML Purifyer loaded.<br>";
}else{
    //echo"Shit... we did not get it.<br>";
}
/*----------------------------------------------------*/

// These constants may be changed without breaking existing hashes.
define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 2);
define("HASH_SALT_INDEX", 0);
define("HASH_PBKDF2_INDEX", 1);

function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = true;
    $httponly = true; // This stops JavaScript being able to access the session id.
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?erro=Could not initiate a safe session (ini_set)");
        exit();
    }
    $cookieParams = session_get_cookie_params();// Gets current cookies params.
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    
    session_name($session_name);// Sets the session name to the one set above.
    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one.
}

function login($email, $pass, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT id_cliente, nome, senhaHash FROM cliente WHERE email = ? LIMIT 1")){
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
        $stmt->bind_result($user_id, $username, $passHash);// get variables from result.
        $stmt->fetch();
        
        //echo "<br>user_id: ".$user_id."<br>username: ".$username."<br>passHash: ".$passHash;
        
        // hash the password with the unique salt.
        if ($stmt->num_rows == 1) {
                // Check if the password in the database matches the password the user submitted.
                if (validate_password($pass, $passHash)) {
                    $user_browser = $_SERVER['HTTP_USER_AGENT']; //string with the user borwser
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id); //XSS protection
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); //XSS protection
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['login_string'] = hash(PBKDF2_HASH_ALGORITHM, $passHash . $user_browser);
                    $_SESSION['username'] = $username;
                    return true;
                } else {
                    // Case the password is not correct we record this attempt in the database
                    $now = time();
                    $mysqli->query("INSERT INTO loginattempt(id_cliente, time) VALUES ('$user_id', '$now')");
                    return false;
                }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    $now = time(); //Get timestamp of current time 
    $valid_attempts = $now - (2 * 60 * 60);// All login attempts are counted from the past 2 hours. 
    if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")){
        $stmt->bind_param('i', $user_id);
        $stmt->execute(); //Execute the prepared query. 
        $stmt->store_result();
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
        $user_browser = $_SERVER['HTTP_USER_AGENT'];// Get the user-agent string of the user.
        if ($stmt = $mysqli->prepare("SELECT senhaHash FROM cliente WHERE id_cliente = ? LIMIT 1")) {
            $stmt->bind_param('i', $user_id);// Bind "$user_id" to parameter. 
            $stmt->execute(); // Execute the prepared query.
            $stmt->store_result();
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($passHash);
                $stmt->fetch();
                $login_check = hash(PBKDF2_HASH_ALGORITHM, $passHash . $user_browser);
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}


function create_hash($password)
{
    // format: algorithm:iterations:salt:hash
    $salt = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
    // returns salt:hash
    return $salt . ":" . base64_encode(pbkdf2(
        PBKDF2_HASH_ALGORITHM,
        $password,
        $salt,
        PBKDF2_ITERATIONS,
        PBKDF2_HASH_BYTE_SIZE,
        true
    ));
}

function validate_password($password, $correct_hash)
{
    $params = explode(":", $correct_hash);
    if(count($params) < HASH_SECTIONS)
       return false; 
    $pbkdf2 = base64_decode($params[HASH_PBKDF2_INDEX]);
    return slow_equals(
        $pbkdf2,
        pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $password,
            $params[HASH_SALT_INDEX],
            PBKDF2_ITERATIONS,
            strlen($pbkdf2),
            true
        )
    );
}

// Compares two strings $a and $b in length-constant time.
function slow_equals($a, $b)
{
    $diff = strlen($a) ^ strlen($b);
    for($i = 0; $i < strlen($a) && $i < strlen($b); $i++)
    {
        $diff |= ord($a[$i]) ^ ord($b[$i]);
    }
    return $diff === 0; 
}

/*
 * PBKDF2 key derivation function as defined by RSA's PKCS #5: https://www.ietf.org/rfc/rfc2898.txt
 * $algorithm - The hash algorithm to use. Recommended: SHA256
 * $password - The password.
 * $salt - A salt that is unique to the password.
 * $count - Iteration count. Higher is better, but slower. Recommended: At least 1000.
 * $key_length - The length of the derived key in bytes.
 * $raw_output - If true, the key is returned in raw binary format. Hex encoded otherwise.
 * Returns: A $key_length-byte key derived from the password and salt.
 *
 * Test vectors can be found here: https://www.ietf.org/rfc/rfc6070.txt
 *
 * This implementation of PBKDF2 was originally created by https://defuse.ca
 * With improvements by http://www.variations-of-shadow.com
 */
function pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output = false)
{
    $algorithm = strtolower($algorithm);
    if(!in_array($algorithm, hash_algos(), true))
        trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($count <= 0 || $key_length <= 0)
        trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);

    if (function_exists("hash_pbkdf2")) {
        // The output length is in NIBBLES (4-bits) if $raw_output is false!
        if (!$raw_output) {
            $key_length = $key_length * 2;
        }
        return hash_pbkdf2($algorithm, $password, $salt, $count, $key_length, $raw_output);
    }

    $hash_length = strlen(hash($algorithm, "", true));
    $block_count = ceil($key_length / $hash_length);

    $output = "";
    for($i = 1; $i <= $block_count; $i++) {
        // $i encoded as 4 bytes, big endian.
        $last = $salt . pack("N", $i);// $i encoded as 4 bytes, big endian.
        // first iteration
        $last = $xorsum = hash_hmac($algorithm, $last, $password, true);
        // perform the other $count - 1 iterations
        for ($j = 1; $j < $count; $j++) {
            $xorsum ^= ($last = hash_hmac($algorithm, $last, $password, true));
        }
        $output .= $xorsum;
    }

    if($raw_output)
        return substr($output, 0, $key_length);
    else
        return bin2hex(substr($output, 0, $key_length));
}

/* A função mkQuery() serve para montar uma query simples.
 * $tables é uma string com os nomes das tabelas usadas na query.
 * $whatToSelect é uma string com os campos/colunas a serem buscados na tabela referida.
 * $condition é uma string que descreve a condição a ser aceita para a linha ser retornada.
 * $orderBy é opcionar. Deve ser uma string com o ordenamento a ser feito no resultado.
 */
function mkQuery($tables, $whatToSelect, $condition = false, $orderBy = false){
    $query = "SELECT ".$whatToSelect." FROM ".$tables;
    if($condition != false){
        $query = $query." WHERE ".$condition;
    }
    if($orderBy != false){
        $query = $query." ORDER BY ".$orderBy;
    }
    return $query;
}

/* A função runQuery() executa uma query, gera uma array assossiativa com os resultados e a armazena numa variável de $_SESSION.
 * $dbCon deve ser um link com um banco de dados válido.
 * $query deve ser uma string contendo a query a ser executada.
 * $sessionVarName deve ser o nome da variável $_SESSION onde a array gerada pela função será armazenada.
 * $fields deve ser uma array com o nome das colunas que serão retornadas pela query em $query, na mesma ordem que aparecem em $query.
 */
function runQuery($dbCon, $query, $fields){
    $queryResult = mysqli_query($dbCon, $query);
    
    $rowsArray = array();
    $subArray = array();
    $arrayPiece = array();
    
    while($row = mysqli_fetch_array($queryResult)){
        unset($subArray);
        $subArray = array();
        for($i = 0; $i < count($fields); $i++){
            unset($arrayPiece);
            $arrayPiece = array($fields[$i] => $row[$fields[$i]]);
            $subArray = array_merge($subArray, $arrayPiece);
        }
        array_push($rowsArray, $subArray);
    }
    return $rowsArray;
}

/* A função listNextProds() é especifica para listar os produtos em N linhas de 6 colunas,
 * usando uma tabela estilizada própia. Para usar o resultado das funções anteriores em listagens
 * é necessário criar uma função nova.
 * $prodsArray é a array com os produtos.
 * $iniIndex é o index de onde começará a listagem na array.
 * $range é o alcance da listagem, ou quantos produtos serão listados.
 */
function listNextProds($prodsArray, $iniIndex, $range){
    $rowCount = 0;
    echo '<table>';
    for($i = $iniIndex; ($i < ($iniIndex + $range) && $i < count($prodsArray)); $i++){
        $prodXml = simplexml_load_file('produtos/'.$prodsArray[$i]['id_produto'].'/data.xml');
        if($rowCount == 0){
            echo'<tr>';
        }
        echo'<td class="prodTD">';
        echo'<a href="produto.php?prodID='.$prodsArray[$i]['id_produto'].'">';
        echo'<div class="prodSmallBlock">';
        echo'<div style="display: table; margin: auto;">';
        echo'<img src="produtos/'.$prodsArray[$i]['id_produto'].'/media/s_'.$prodXml->cover.'"><br>';
        echo ucwords($prodsArray[$i]['nome_prod']).'<br>';
        echo'R$ '.$prodsArray[$i]['preco'];
        echo'</div>';
        echo'</div>';
        echo'</a>';
        echo'</td>';
        if($rowCount == 5){
            echo'</tr>';
        }
        $rowCount += 1;
        if($rowCount >= 6){
            $rowCount = 0;
        }
    }
    echo '</table>';
    return $iniIndex + $range;
}
/* A função mkNavLinks() gera os links de navegação entre as paginas geradas pela consulta ao DB.
 * $prodsAmount é a quanditade de produtos a serem acomodados. Um simples count($arrayDe Produtos)
 * passado como argumento nos dá a informação adequada.
 * $prodsPerPage é a quantidade de produtos a serem exibidos por cada pagina.
 * $indexName é o nome da váriável $_GET que será usada para armazenar o valor do marcador do
 * primeiro produto de cada página.
 * $pageName é o nome da própia pagina onde os links de navegação serão gerados.
 */
function mkNavLinks($prodsAmount, $prodsPerPAge, $indexName, $pageName){
    $pages = $prodsAmount;
    $pageCount = floor($pages / $prodsPerPAge);
    $lastPage = $pages % $prodsPerPAge;
    if($lastPage != 0){
        $pageCount += 1;
    }
    for($i = 0; $i < $pageCount; $i++){
        echo '<a class="navLink" href="'.$pageName.'?'.$indexName.'='.($i*$prodsPerPAge).'&unsetPA=0"> '.($i + 1).' </a> ';
    }
}

function addCreditCard($id_cliente, $nameCard, $cardNumber, $mysqli){
    if($stmt = $mysqli->prepare("INSERT INTO cartao VALUES (?, ?, ?)")){
        $stmt->bind_param('dss',$id_cliente,$nameCard,$cardNumber);
        $stmt->execute();
        $stmt->store_result();
    }else{
        $_SESSION["erro"] = "Não foi possível estabelecer conexão com o banco de dados.<br>";
        header("Location: ../erro.php");
    }
}

