<?php
    $moveDir = "uploads/";
    if($_FILES["file"]["error"] > 0){
        echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }else{
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Tipo: " . $_FILES["file"]["type"] . "<br>";
        echo "Tamanho: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Armazenado em: " . $_FILES["file"]["tmp_name"];
        echo "<br>";
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$moveDir.$_FILES["file"]["name"])){
            echo"Arquivo salvo com sucesso.<br>Movido para: ".$moveDir;
        }else{
            echo"Não foi possível salvar o arquivo.";
        }
    }