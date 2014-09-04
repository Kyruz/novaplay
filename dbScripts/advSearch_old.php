<?php
    
    session_start();
    include 'dbConnect.php';
    include 'dbDisconect.php';
    include'searchCore.php';
    $words = $wordSet = '';
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $words = $_POST['wordSet'];
        $wordHandle = $_POST['wordHandle'];
        $searchBy = $_POST['searchBy'];
        $categHandle = $_POST['categHandle'];
        $categCodes = $_POST['codCategoria'];
        $words = mb_strtolower($words,'utf-8');
        $wordSet = explode(' ',$words);
        $result = fullSearch($dbCon, $wordHandle, $searchBy, $categHandle, $wordSet, $categCodes);
        if($result != NULL){
            $_SESSION['searchResult'] = $result;
        }else{
            $_SESSION['errMens'] = '<br>Some shit made the result NULL.<br>';
        }
        
        $_SESSION['varType'] = gettype($categCodes);
        $_SESSION['codes'] = $categCodes;
    }
    
    header("Location: ../busca.php");
    