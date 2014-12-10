<?php
include_once "./dbCon.php";
include_once "./funLib.php";

if(!isset($_POST["email"], $_POST["pass"], $_POST["nome"], $_POST["nasc"], $_POST["cpf"],
         $_POST["rg"], $_POST["celular"], $_POST["cep"], $_POST["estado"], $_POST["cidade"],
         $_POST["bairro"], $_POST["complemento"], $_POST["telFixo"], $_POST["numResi"]))
{
    header("Location: http://localhost/index.php");
}
else
{
    if($_POST["email"] == ""){
        
    }else{
        $email = mysqli_real_escape_string($_POST["email"]);
        
    }
    
    $passHash = create_hash($_POST["pass"]);
    $name = $_POST["nome"];
    $nasc = $_POST["nasc"];
    $cpf = $_POST["cpf"];
    $rg = $_POST["rg"];
    $celular = $_POST["celular"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];
    $comp = $_POST["complemento"];
    $telFixo = $_POST["telFixo"];
    $numResi = $_POST["numResi"];
    
    $atvCode = md5(uniqid(rand(), true));
    
    date_default_timezone_set("America/Sao_Paulo");
    $dataAdesao = date("Y/m/d");
    
    $sqlQuery = "INSERT INTO cliente(email,senhaHash,nome,nascimento,cpf,rg,celular,cep,estado,cidade,bairro,complemento,dataAdesao,telFixo,numResi,codigo_atv) "
            . "VALUES ('".$email."','".$passHash."','".$name."','".$nasc."','".$cpf."','".$rg."','".$celular."','".$cep."','".$estado."','".$cidade."','".$bairro."','".$comp."','".$dataAdesao."','".$telFixo."','".$numResi."','".$atvCode."')";
    echo $sqlQuery;
    
    mysqli_query($dbCon, $sqlQuery);
    
    $message = "Para ativar sua conta, por favor click no link a seguir: \n \n";
    $message .= "http://localhost/novaplay/activate.php?email=".urlencode($email)."&atvCode=".$atvCode;
    mail($email, "Confirmação de Cadastro", $message, "From: Systema Novaplay");
    
}
