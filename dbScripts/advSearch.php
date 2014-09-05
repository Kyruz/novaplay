<?php
    
    session_start();
    include 'dbConnect.php';
    include 'dbDisconect.php';
    include'searchCore.php';
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $wordString = $_POST['wordsString'];
        $searchType = $_POST['searchType'];
        $searchCols = $_POST['searchCol'];
        if(isset($_POST['codCategoria'])){
            $codCat = $_POST['codCategoria'];
        }else{
            $codCat = -1;
        }
        
        $wordString = test_input($wordString);
        $wordString = mb_strtolower($wordString);
        $wordSet = explode(" ", $wordString);
        
        advSearch($dbCon, $wordSet, $searchType, $searchCols, $codCat);
        
        /*
        if($result = advSearch($dbCon, $wordSet, $searchType, $searchCols, $codCat)){
            $_SESSION['mysqlQuery'] = $result;
            header("Location: ../busca.php");
        }
        */
    }
   
    function advSearch($con, $wordSet, $searchType, $searchCols, $codCat){
        $wordList = "";
        $catQuery = "";
        $colsList = "";
        $idArray = array();
        
        if($searchType == "tep"){
            for($i = 0; $i < count($wordSet); $i++){
                $wordSet[$i] = "+".$wordSet[$i];
                $wordList = $wordList.$wordSet[$i]." ";
            }
        }else{
            for($i = 0; $i < count($wordSet); $i++){
                $wordList = $wordList.$wordSet[$i]." ";
            }
        }
        
        if($codCat > -1){
            $catQuery = " AND (cod_categoria IN ( ";
            for($j = 0; $j < (count($codCat) - 1); $j++){
                $catQuery = $catQuery.$codCat[$j].", ";
            }
            $index = count($codCat)-1;
            $catQuery = $catQuery.$codCat[$index]."))";
        }
        
        for($k = 0; $k < (count($searchCols) - 1); $k++){
            $colsList = $colsList.$searchCols[$k].", ";
        }
        $index = count($searchCols) - 1;
        $colsList = $colsList.$searchCols[$index];
        
        $sqliQuery = "SELECT * FROM produto WHERE (MATCH (".$colsList.") AGAINST ('".$wordList."' IN BOOLEAN MODE))".$catQuery;
        $result = mysqli_query($con, $sqliQuery);
        $index = 0;
        while($row = mysqli_fetch_array($result)){
            $idArray[$index] = $row['id_produto'];
            $index++;
        }
        
        $_SESSION['idArray'] = $idArray;
        header("Location: ../busca.php");
    }