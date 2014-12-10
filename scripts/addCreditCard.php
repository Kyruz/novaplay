<?php
include "./dbCon.php";
include "./funLib.php";
sec_session_start();

/*
echo "UserID: ".$_SESSION["user_id"]."<br>";
echo "Banco: ".$_POST["banco"]."<br>";
echo "NumCart: ".$_POST["numCartao"]."<br>";
echo "Pass: ".$_POST["pass"]."<br>";
*/

if(isset($_SESSION["user_id"],$_POST["banco"],$_POST["numCartao"],$_POST["pass"])){
    echo"Inside IF<br>";
    //Get the pass, hash it and compare with the hash using the id_cliente
    echo "user_id: ".$_SESSION["user_id"]."<br>banco: ".$_POST["banco"]."<br>numCartao: ".$_POST["numCartao"]."<br>pass: ".$_POST["pass"]."<br><br>";
    $id_cliente = $_SESSION["user_id"];
    $numCartao = $_POST["numCartao"];//Tratar, sanitizar, etc...
    $banco = $_POST["banco"];//Tratar, sanitizar, etc...
    if($stmt = $dbCon->prepare("INSERT INTO cartao (id_cliente,banco,numero) VALUES (?,?,?)")){
        $stmt->bind_param('dss',$id_cliente,$banco,$numCartao);
        $stmt->execute();
        $_SESSION["info"] = "Seu cartão foi adicionado com êxito.";
        header("Location: ../info.php");
    }else{
        $_SESSION["erro"] = "Não foi póssível registrar seu novo cartão. Por favor,<br>tente novamente mais tarde ou entre em contato com o suporte do sistema.<br>";
        header("Location: ../erro.php");
    }
}else{
    $_SESSION["erro"] = "Um erro impediu que os dados enviados chegassem ao servidor,<br>o que impossibilitou registrar o cartão.<br>Por favor, tente novamente mais tarde ou entre em contato com o suporte do sistema.<br>";
    header("Location: ../erro.php");
}