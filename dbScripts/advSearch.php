<?php
    
    session_start();
    include 'dbConnect.php';
    include 'dbDisconect.php';
    include'searchCore.php';//Functions used for intern searches
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        if(isset($_POST['wordsString'])){
            $wordString = $_POST['wordsString'];
        }else{
            $_SESSION['searchErr1'] = "Não há palavras para a busca.";
        }
        if(isset($_POST['searchType'])){
            $searchType = $_POST['searchType'];
        }else{
            $_SESSION['searchErr'] = "Erro não identificado impediu o servidor de detectar qual tipo de pesquisa a ser feita.";
        }
        if(isset($_POST['searchCol'])){
            $searchCols = $_POST['searchCol'];
        }else{
            $_SESSION['searchErr3'] = "É necessário selecionar ao menos uma forma de procura.";
        }
        if(isset($_POST['codCategoria'])){
            $codCat = $_POST['codCategoria'];
        }else{
            $codCat = -1;
        }
        
        $wordString = test_input($wordString);
        $wordString = mb_strtolower($wordString);
        $wordSet = explode(" ", $wordString);
        
        if($idSet = advSearch($dbCon, $wordSet, $searchType, $searchCols, $codCat)){
            $_SESSION['idArray'] = $idSet;
            header("Location: ../busca.php");
        }
        
    }