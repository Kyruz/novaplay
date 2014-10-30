<?php

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