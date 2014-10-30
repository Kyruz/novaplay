<?php

include './dbConnect.php';
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
include './dbDisconect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $celular = $_POST['celular'];
    $telFixo = $_POST['telFixo'];
    $cep = $_POST['cep'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $numResi = $_POST['numResi'];
    date_default_timezone_set("America/Sao_Paulo");
    $dataAdesao = date("Y/m/d");
    
    $query = "INSERT INTO cliente(email, senhaHash, nome, nascimento, cpf, rg, celular, telFixo, cep, estado, cidade, bairro, complemento, numResi, dataAdesao) "
            ."VALUES ('".$email."','".$senha."','".$nome."','".$nasc."','".$cpf."','".$rg."','".$celular."','".$telFixo."','".$cep."','".$estado."','".$cidade."','".$bairro."','".$complemento."','".$numResi."','".$dataAdesao."')";
    mysqli_query($dbCon, $query);
    echo $query;
    
}
