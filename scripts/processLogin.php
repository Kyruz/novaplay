<?php
include_once "./dbCon.php";
include_once "./funLib.php";

sec_session_start();

if (isset($_POST['email'], $_POST['pass'])) {
    $email = $_POST['email']; // The email, used as username for login here
    $pass = $_POST['pass']; // Raw password
    if(isset($_SESSION["urlAtual"])){
        $urlAtual = $_SESSION["urlAtual"];
    }else{
        $urlAtual = "../index.php";
    }
    if (login($email, $pass, $dbCon) == true) {
        // Login success
        header("Location: $urlAtual");
    } else {
        // Login failed
        $_SESSION["erro"] = "Email ou senha inválidos.";
        header('Location: ../erro.php');
    }
} else {
    // The correct POST variables were not sent to this page. 
    $_SESSION["erro"] = "Dados recebidos são inválidos para login.";
    header("Location: ../erro.php");
}
