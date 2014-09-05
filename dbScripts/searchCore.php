<?php
    
    function searchComplete($connection, $elements){
        $idSet = array();
        for($i = 0; $i < count($elements); $i++){
            $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$elements[$i]."%') ORDER BY nome_prod");
            $nameResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$elements[$i]."%') ORDER BY nome_prod");
            while($nameRow = mysqli_fetch_array($nameResult)){
                if((in_array($nameRow['id_produto'], $idSet)) != TRUE){
                    array_push($idSet, $nameRow['id_produto']);
                }
            }
            while($tagRow = mysqli_fetch_array($tagResult)){
                if((in_array($tagRow['id_produto'], $idSet)) != TRUE){
                    array_push($idSet, $tagRow['id_produto']);
                }
            }
        }
        return $idSet;
    }

    function fullSearch($connection, $wordSet, $searchType, $searchCols, $codCat){
        
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }