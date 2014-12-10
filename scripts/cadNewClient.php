<?php
include_once "./dbCon.php";
include_once "./funLib.php";
require_once "./HTMLPurifierLib/HTMLPurifier.auto.php";

sec_session_start();

date_default_timezone_set("America/Sao_Paulo");

$ready = true;
$errMsg = "";

/*-- Email verification --*/
if(isset($_POST["email"]) && $_POST["email"] != ""){  //Checks if email was informed.
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){  //Checks if the string received is a valid email.
        if(isset($_POST["confEmail"]) && $_POST["confEmail"] != ""){  //Checks if email confirmation was informed.
            if($_POST["email"] === $_POST["confEmail"]){  //Checks if they are equals.
                /*-- Escape and clean the email string --*/
                $email = mysqli_real_escape_string($dbCon, $_POST["email"]);
                $email = $purifier->purify($email);
                /*-- Do the same to the confirmation email string --*/
                $emailConf = mysqli_real_escape_string($dbCon, $_POST["confEmail"]);
                $emailConf = $purifier->purify($emailConf);
                /*-- Save the received input for retrival in the form, for user convenience. --*/
                $_SESSION["formEmail"] = $_POST["email"];
                $_SESSION["confEmail"] = $_POST["confEmail"];
            }else{
                $ready = false;
                $errMsg .= "Email e confirmação de email são diferentes.<br>";
            }
        }else{
            $ready = false;
            $errMsg .= "Por favor, repita seu email para confirmação.<br>";
        }
    }else{
        $ready = false;
        $errMsg .= "Por favor, insira um email válido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Email não informado.<br>";
}

/*-- Check if email already exists --*/
$sqlQueryMail = "SELECT * FROM cliente WHERE email = ?";
$stmtMail = $dbCon->prepare($sqlQueryMail);
if($stmtMail){
    $stmtMail->bind_param('s',$email);
    $stmtMail->execute();
    $stmtMail->store_result();
    if($stmtMail->num_rows > 0){
        $errMsg .= "Email ja está em uso.<br>";
        $ready = false;
    }
}

/*-- Password verification --*/
if(isset($_POST["pass"]) && $_POST["pass"] != ""){  //Check if any value has been received.
    //$errMsg .= "Pass lengh: ".strlen($_POST["pass"])."<br>";
    if(strlen($_POST["pass"]) >= 6){  //Checks if the password is too small.
        //$errMsg .= "Pass: ".$_POST["pass"]." Pass Conf: ".$_POST["confPass"]."<br>";
        if(isset($_POST["confPass"]) && $_POST["confPass"] != ""){ //Cheks if confirmation has been passed.
            if($_POST["confPass"] === $_POST["pass"]){  //Checks if password and confirmation are equal.
                $passHash = create_hash($_POST["pass"]);  //Calls the function that generates the password hash to be stored in the DB.
            }else{
                $ready = false;
                $errMsg .= "Senha e confirmação de senha são diferentes.<br>";
            }
        }else{
            $ready = false;
            $errMsg .= "Por favor, repita a senha.<br>";
        }
    }else{
        $ready = false;
        $errMsg .= "Senha curta demais. Para sua segurança, insira uma senha de, no mínimo, 6 caracteres.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "É preciso informar uma senha.<br>";
}

/*-- Name verification --*/
if(isset($_POST["nome"]) && $_POST["nome"] != ""){  //Checks if name has been passed.
    if(ctype_alpha(str_replace(' ','',$_POST["nome"]))){  //Make shure only contain letters and whitespace.
        $name = mysqli_real_escape_string($dbCon, $_POST["nome"]);  //Escape chars for MySQL.
        $name = $purifier->purify($name);  //Uses HTMLPurifier for clean and XSS safe string.
        $_SESSION["nome"] = $_POST["nome"];  //This is for retrival of the typed value on the form. For user convenience only.
    }else{
        $ready = false;
        $errMsg .= "Um nome válido deve ser composto apenas por letras e espaços.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Informar nome.<br>";
}

/*-- Nascimento verificação --*/
if(isset($_POST["nascD"], $_POST["nascM"], $_POST["nascA"]) && 
        ($_POST["nascD"] != "" && $_POST["nascM"] != "" && $_POST["nascA"] != "")){
    // Verifica se os dados recebidos são numéricos
    if((is_numeric($_POST["nascD"])) && (is_numeric($_POST["nascM"])) && (is_numeric($_POST["nascA"]))){
        $nascOK = true;
        // Checa tamanho da string nascD, que deve ser 2 ou 1
        if(strlen($_POST["nascD"]) === 2 || strlen($_POST["nascD"]) === 1){
            $nd = $_POST["nascD"];
            $nd = $purifier->purify($nd);
            $nd = mysqli_real_escape_string($dbCon, $nd);
            $_SESSION["nascD"] = $_POST["nascD"];
        }else{
            $nascOK = false;
        }
        // Checa tamanho da string nascM, que deve ser 2 ou 1
        if(strlen($_POST["nascM"]) === 2 || strlen($_POST["nascM"]) === 1){
            $nm = $_POST["nascM"];
            $nm = $purifier->purify($nm);
            $nm = mysqli_real_escape_string($dbCon, $nm);
            $_SESSION["nascM"] = $_POST["nascM"];
        }else{
            $nascOK = false;
        }
        // Checa tamanho da string nascA, que deve ser 4
        if(strlen($_POST["nascA"]) === 4){
            $na = $_POST["nascA"];
            $na = $purifier->purify($na);
            $na = mysqli_real_escape_string($dbCon, $na);
            $_SESSION["nascA"] = $_POST["nascA"];
        }else{
            $nascOK = false;
        }
    }else{
        $rady = false;
        $errMsg .= "Apenas números na data.<br>";
    }
    if($nascOK){
        $nasc = "$na-$nm-$nd";
        //$errMsg .= "Nasc: ".$nas."<br>"c;
    }else{
        $ready = false;
        $errMsg .= "Informação sobre data de nascimento recebida foi inválida.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Por favor, informar sua data de nascimento.<br>";
}

/*-- Validar CPF --*/
if(isset($_POST["cpf"]) && $_POST["cpf"] != ""){
    $cpf = preg_replace("/[^0-9]/","",$_POST["cpf"]);
    //$errMsg .= "CPF: $cpf <br>";
    if(is_numeric($cpf) && strlen($cpf) === 11){
        $cpf = mysqli_real_escape_string($dbCon, $cpf);
        $cpf = $purifier->purify($cpf);
        $_SESSION["cpf"] = $_POST["cpf"];
    }else{
        $ready = false;
        $errMsg .= "O CPF informado é invalido. Por favor, digite os numeros do seu CPF.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Seu CPF é necessário.<br>";
}

/*-- RG Verification --*/
if(isset($_POST["rg"]) && $_POST["rg"] != ""){ //check if RG is informed.
    $rg = preg_replace("/[^a-zA-Z0-9]/","",$_POST["rg"]);  //Remove all non alphanumeric characters
    //$errMsg .= "RG: $rg <br>";
    if(ctype_alnum($rg)){ //Check if the result makes sense as RG
        $rg = mysqli_real_escape_string($dbCon, $rg);
        $rg = $purifier->purify($rg);
        $_SESSION["rg"] = $_POST["rg"];
    }else{
        $ready = false;
        $errMsg .= "O RG informado é inválido. Por favor, digite o seu RG.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Seu RG é necessário.<br>";
}

/*-- Cellphone verification --*/
if(isset($_POST["celular"]) && $_POST["celular"] != ""){ //Check if cellphone number has been passed.
    $celular = preg_replace("/[^0-9]/", "", $_POST["celular"]);  //Remove anithing but numbers from the string.
    //$errMsg .= "Celular: $celular <br>";
    if(strlen($celular) == 10){ //check if the number of digits makes sense.
        $celular = mysqli_real_escape_string($dbCon, $celular);
        $celular = $purifier->purify($celular);
        $_SESSION["celular"] = $_POST["celular"];
    }else{
        $ready = false;
        $errMsg .= "O celular informado é invalido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "É necessário informar um número de celular.<br>";
}

/*-- Fix phone verification --*/
if(isset($_POST["telFixo"]) && $_POST["telFixo"] != ""){
    $telFixo = preg_replace("/[^0-9]/", "", $_POST["telFixo"]);  //Remove anithing but numbers from the string.
    //$errMsg .= "Fixo: $telFixo <br>";
    if(strlen($telFixo) === 10 || count($telFixo) === 9){ //che if the number of digits makes sense.
        $telFixo = mysqli_real_escape_string($dbCon, $telFixo);
        $telFixo = $purifier->purify($telFixo);
        $_SESSION["telFixo"] = $_POST["telFixo"];
    }else{
        $ready = false;
        $errMsg .= "O número de telefone fixo informado é invalido.<br>";
    }
}

/*-- CEP verification --*/
if(isset($_POST["cep"]) && $_POST["cep"] != ""){
    $cep = preg_replace("/[^0-9]/", "", $_POST["cep"]);  //Remove anithing but numbers from the string.
    //$errMsg .= "CEP: $cep <br>";
    if(is_numeric($cep) && strlen($cep) === 8){
        $cep = mysqli_real_escape_string($dbCon, $cep);
        $cep = $purifier->purify($cep);
        $_SESSION["cep"] = $_POST["cep"];
    }else{
        $ready = false;
        $errMsg .= "CEP inválido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "É necessário informar o CEP.<br>";
}

if(isset($_POST["estado"]) && $_POST["estado"] != ""){
    //$errMsg .= "Estado: ".$_POST["estado"]."<br>";
    if(ctype_alpha(str_replace(' ', '', $_POST["estado"]))){
        $estado = mysqli_real_escape_string($dbCon, $_POST["estado"]);
        $estado = $purifier->purify($estado);
        $_SESSION["estado"] = $_POST["estado"];
    }else{
        $ready = false;
        $errMsg .= "Nome de estado inválido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Informar o Estado.<br>";
}

if(isset($_POST["cidade"]) && $_POST["cidade"] != ""){
    //$errMsg .= "Cidade: ".$_POST["cidade"]."<br>";
    if(preg_match("/[0-9]/", $_POST["cidade"]) == false){
        $cidade = mysqli_real_escape_string($dbCon, $_POST["cidade"]);
        $cidade = $purifier->purify($cidade);
        $_SESSION["cidade"] = $_POST["cidade"];
    }else{
        $ready = false;
        $errMsg .= "Nome de cidade inválido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Informar Cidade.<br>";
}

if(isset($_POST["bairro"]) && $_POST["bairro"] != ""){
    //$errMsg .= "Bairro: ".$_POST["bairro"]."<br>";
    if(preg_match("/[0-9]/", $_POST["bairro"]) == false){
        $bairro = mysqli_real_escape_string($dbCon, $_POST["bairro"]);
        $bairro = $purifier->purify($bairro);
        $_SESSION["bairro"] = $_POST["bairro"];
    }else{
        $ready = false;
        $errMsg .= "Nome de bairro inválido.<br>";
    }
}else{
    $ready = false;
    $errMsg .= "Informar Bairro.<br>";
}

if(isset($_POST["complemento"]) && $_POST["complemento"] != ""){
    $comp = mysqli_real_escape_string($dbCon, $_POST["complemento"]);
    $comp = $purifier->purify($comp);
    $_SESSION["complemento"] = $_POST["complemento"];
}

if(isset($_POST["numResi"]) && $_POST["numResi"] != ""){
    $numResi = preg_replace("/[^a-zA-Z0-9]/", '',$_POST["numResi"]);
    $numResi = mysqli_real_escape_string($dbCon, $_POST["numResi"]);
    $numResi = $purifier->purify($numResi);
    $_SESSION["numResi"] = $_POST["numResi"];
}else{
    $ready = false;
    $errMsg .= "Informar número de residência ou do prédio.<br>";
}

if(isset($_POST["accepted"]) && $_POST["accepted"] == "y"){
    $_SESSION["accepted"] = true;
}else{
    $ready = false;
    $errMsg .= "É preciso aceitar os termos de serviço.<br>";
}


$dataAdesao = date("Y-m-d");
//$errMsg .= "Adesão: ".$dataAdesao."<br>";

if($ready){
    $atvCode = md5(uniqid(rand(), true));
    
    //$sqlQuery = "INSERT INTO cliente(email,senhaHash,nome,nascimento,cpf,rg,celular,cep,estado,cidade,bairro,complemento,dataAdesao,telFixo,numResi,codigo_atv) VALUES ('".$email."','".$passHash."','".$name."','".$nasc."','".$cpf."','".$rg."','".$celular."','".$cep."','".$estado."','".$cidade."','".$bairro."','".$comp."','".$dataAdesao."','".$telFixo."','".$numResi."','".$atvCode."')";
    //echo "<br><h4>Query:</h4><br>$sqlQuery<br>";
    
    $sqlQuery = "INSERT INTO cliente(email,senhaHash,nome,nascimento,cpf,rg,celular,cep,estado,cidade,bairro,complemento,dataAdesao,telFixo,numResi,codigo_atv) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $dbCon->prepare($sqlQuery);
    //echo "Apos dbCon->prepare() : ".mysqli_error($dbCon)."<br>";
    if($stmt){
        $stmt->bind_param('ssssssssssssssss',$email,$passHash,$name,$nasc,$cpf,$rg,$celular,$cep,$estado,$cidade,$bairro,$comp,$dataAdesao,$telFixo,$numResi,$atvCode);
        //echo "Apos stmt->bind_param() : ".mysqli_error($dbCon)."<br>";
        $stmt->execute();
        //echo "Apos stmt->execute() : ".mysqli_error($dbCon)."<br>";
        $stmt->store_result();
        //echo "Apos stmt->store_result() : ".mysqli_error($dbCon)."<br>";
        //$result = $stmt->get_result();
    }
    //echo "Fora e depois do if(stmt){} : ".mysqli_error($dbCon)."<br>";
    //$sqlQuery = "UPDATE cliente SET nascimento = $nasc WHERE email = $email";
    //mysqli_query($dbCon, $sqlQuery);
    
    /*
    $message = "Para ativar sua conta, por favor click no link a seguir: \n \n";
    $message .= "http://localhost/novaplay/activate.php?email=".urlencode($email)."&atvCode=".$atvCode;
    mail($email, "Confirmação de Cadastro", $message, "From: Systema Novaplay");
    */
}
else
{
    header("Location: https://localhost/novaplay/cadastro.php?errMsg=".$errMsg);
}
