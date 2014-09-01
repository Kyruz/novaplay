<?php
    
    $hostDoor = 'localhost:3306';
    $user = 'play_db_adm';
    $pass = 's5g1re862fh8r1ase7v5s1fs5r';
    $dbName = 'novaplay_db';
    
    $dbCon = mysqli_connect($hostDoor,$user,$pass,$dbName);
    
    $nome = $codigo = $preco = $produtor = $quantidade = $categoria = $tags = $descricao = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nome"])){
            $nomeErr = "Entre o nome do produto";
        }else{
            $nome = test_input($_POST["nome"]);
        }
        if(empty($_POST["codigo"])){
            $codigoErr = "Entre o código do produto";
        }else{
            $codigo = test_input($_POST["codigo"]);
        }
        $preco = test_input($_POST["preco"]);
        $produtor = test_input($_POST["produtor"]);
        $quantidade = test_input($_POST["quantidade"]);
        $categoria = test_input($_POST["categoria"]);
        $tags = test_input($_POST["tags"]);
        $descricao = test_input($_POST["descricao"]);
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
     
    $addProd = "INSERT INTO produto (nome_prod,codigo_prod,preco,produtor,qtd_estoque,cod_categoria,tags,descricao) VALUES ('$nome','$codigo','$preco','$produtor','$quantidade','$categoria','$tags','$descricao')";
    if(!mysqli_query($dbCon, $addProd)){
        die('Error: '.mysqli_error($dbCon));
    }
    
    $maiorID = "SELECT id_produto FROM produto ORDER BY id_produto DESC LIMIT 1";
    $sel = mysqli_query($dbCon,$maiorID);
    $row = mysqli_fetch_array($sel);
    echo $row['id_produto'];
    echo"<br>";
    
    $myFile = $row['id_produto'].".php";
    $myDir = $row['id_produto']."/";
    mkdir('../produtos/'.$myDir);
    $fh = fopen('../produtos/'.$myDir.$myFile, 'w') or die("can't open file");
    $stringData = "<whatever you want inside the html file>";
    fwrite($fh, $stringData);
    
    echo"<br>Dados inseridos no banco:<br>";
    echo"Nome: ".$nome."<br>";
    echo"Codigo: ".$codigo."<br>";
    echo"Preço: ".$preco."<br>";
    echo"Fabricante: ".$produtor."<br>";
    echo"Quantidade: ".$quantidade."<br>";
    echo"Categoria: ".$categoria."<br>";
    echo"Tags: ".$tags."<br>";
    echo"Descrição adicional:".$descricao."<br>";