<?php
include_once "./dbCon.php";
include_once "./funLib.php";
sec_session_start();

if(isset($_POST["nome"], $_POST["email"], $_POST["assunto"], $_POST["mensagem"]) && 
        !($_POST["nome"] == "" || $_POST["email"] == "" || $_POST["assunto"] == "" || $_POST["mensagem"] == "")){
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
    
    if(mail("eclipsekyruz@gmail.com", $assunto, $mensagem."<br><br>Email: ".$email)){
        header("Location: ../inform.php?msg=1");
    }else{
        $_SESSION["erro"] = "Não foi possível enviar seu email.<br>Por favor tente ".
                "novamente mais tarde, ou ligue (49) 3322-3204.";
        header("Location: ../erro.php");
    }
}