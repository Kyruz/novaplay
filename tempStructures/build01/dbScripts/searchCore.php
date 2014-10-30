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
    
    function advSearch($con, $wordSet, $searchType, $searchCols, $codCat){
        $wordList = "";
        $catQuery = "";
        $colsList = "";
        $idSet = array();
        
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
        
        $sqliQuery = "SELECT * FROM produto WHERE (MATCH (nome_prod, tags, produtor, descricao) AGAINST ('".$wordList."' IN BOOLEAN MODE))".$catQuery;
        
        if($result = mysqli_query($con, $sqliQuery)){
            $index = 0;
            while($row = mysqli_fetch_array($result)){
                $idSet[$index] = $row['id_produto'];
                $index++;
            }
            return $idSet;
        }else{
            return false;
        }
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }