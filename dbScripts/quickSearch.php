<?php
    
    session_start();
    include 'dbConnect.php';
    include 'dbDisconect.php';
    include'searchCore.php';
    $words = $wordSet = '';
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $words = $_POST['wordSet'];
        $words = mb_strtolower($words,'utf-8');
        $wordSet = explode(' ',$words);
        $result = searchComplete($dbCon, $wordSet);
        $_SESSION['searchResult'] = $result;
    }
    
    $_SESSION["words"] = $words;
    header("Location: ../busca.php");
    