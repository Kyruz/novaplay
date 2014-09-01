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
    
    function fullSearch($connection, $wordHandle, $searchBy, $categHandle, $wordSet, $categCodes = NULL){
        $idSet = array();
        if($wordHandle == "alguma"){
            $_SESSION['wordHandleT'] = $_POST['wordHandle'];
            if($categHandle == "todas"){
                $_SESSION['categHandleT'] = $_POST['categHandle'];
                If($searchBy == "NT"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    for($i = 0; $i < count($wordSet); $i++){
                        $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
                        $nameResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
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
                }elseif($searchBy == "N"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    for($i = 0; $i < count($wordSet); $i++){
                        $nameResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
                        while($nameRow = mysqli_fetch_array($nameResult)){
                            $_SESSION['info'] = 'While in.';
                            if((in_array($nameRow['id_produto'], $idSet)) != TRUE){
                                $_SESSION['info1'] = 'Inside IF';
                                array_push($idSet, $nameRow['id_produto']);
                            }
                        }
                    }
                    return $idSet;
                }else/*T*/{
                    for($i = 0; $i < count($wordSet); $i++){
                        $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
                        while($tagRow = mysqli_fetch_array($tagResult)){
                            if((in_array($tagRow['id_produto'], $idSet)) != TRUE){
                                array_push($idSet, $tagRow['id_produto']);
                            }
                        }
                    }
                    return $idSet;
                }
            }else/*ESPEC*/{
                if($searchBy == "NT"){
                    if($categCodes != NULL){
                        $idSet = array();
                        $_SESSION['searchByT'] = $_POST['searchBy'];
                        for($i = 0; $i < count($wordSet); $i++){
                            for($f = 0; $f < count($categCodes); $f++){
                                $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$wordSet[$i]."%') AND cod_categoria = ".$categCodes[$f]);
                                while($row = mysqli_fetch_array($tagResult)){
                                    if(in_array($row['id_produto'], $idSet) != TRUE){
                                        array_push($idSet, $row['id_produto']);
                                    }
                                }
                            }
                        }
                        for($i = 0; $i < count($wordSet); $i++){
                            for($f = 0; $f < count($categCodes); $f++){
                                $nomeResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$wordSet[$i]."%') AND cod_categoria = ".$categCodes[$f]);
                                while($row = mysqli_fetch_array($nomeResult)){
                                    if(in_array($row['id_produto'], $idSet) != TRUE){
                                        array_push($idSet, $row['id_produto']);
                                    }
                                }
                            }
                        }
                        return $idSet;
                    }else{
                        return NULL;
                    }
                }elseif($searchBy == "N"){
                    if($categCodes != NULL){
                        $idSet = array();
                        $_SESSION['searchByT'] = $_POST['searchBy'];
                        for($i = 0; $i < count($wordSet); $i++){
                            for($f = 0; $f < count($categCodes); $f++){
                                $nomeResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$wordSet[$i]."%') AND cod_categoria = ".$categCodes[$f]);
                                while($row = mysqli_fetch_array($nomeResult)){
                                    if(in_array($row['id_produto'], $idSet) != TRUE){
                                        array_push($idSet, $row['id_produto']);
                                    }
                                }
                            }
                        }
                        return $idSet;
                    }else{
                        return NULL;
                    }
                }else/*T*/{
                    if($categCodes != NULL){
                        $idSet = array();
                        $_SESSION['searchByT'] = $_POST['searchBy'];
                        for($i = 0; $i < count($wordSet); $i++){
                            for($f = 0; $f < count($categCodes); $f++){
                                $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$wordSet[$i]."%') AND cod_categoria = ".$categCodes[$f]);
                                while($row = mysqli_fetch_array($tagResult)){
                                    if(in_array($row['id_produto'], $idSet) != TRUE){
                                        array_push($idSet, $row['id_produto']);
                                    }
                                }
                            }
                        }
                        return $idSet;
                    }else{
                        return NULL;
                    }
                }
            }
        }else/*TODAS*/{
            $_SESSION['wordHandleT'] = 'huehuehue';
            /*
            $testString = "('";
            for($q = 0; $q < count($wordSet); $q++){
                if($q + 1 != count($wordSet)){
                    $testString = $testString."%".$wordSet[$q]."',";
                }else{
                    $testString = $testString."'".$wordSet[$q]."')";
                }
            }
            */
            
            $idSet = array();
            for($i = 0; $i < count($wordSet); $i++){
                $tagResult = mysqli_query($connection, "SELECT * FROM produto WHERE tags LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
                $nameResult = mysqli_query($connection, "SELECT * FROM produto WHERE nome_prod LIKE ('%".$wordSet[$i]."%') ORDER BY nome_prod");
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
            
            //VOCÊ ESTÁ AQUI LUCAS----------------------------------------------
            
            for($e = 0; $e < count($idSet); $e++){
                $retProd = TRUE;
                $prodQuery = mysqli_query($connection, "SELECT * FROM produto WHERE id_produto = ".$idSet[$e]);
                while($prodRow = mysqli_fetch_array($prodQuery)){
                    for($i = 0; $i < count($wordSet); $i++){
                        if((mb_stripos($prodRow['nome_prod'], $wordSet[$i]) == NULL) && (mb_stripos($prodRow['tags'], $wordSet[$i]) == NULL)){
                            $_SESSION['mainInfo2'] = "<br>Inside IF<br>";
                            $retProd = FALSE;
                            break 2;
                        }else{
                            $_SESSION['mainInfo1'] = "<br>Inside ELSE<br>";
                        }
                    }
                }
                if($retProd){
                    array_push($finalArray, $idSet[$e]);
                    $_SESSION['mainInfo3'] = "<br>array_push called.<br>";
                }
            }
            return $finalArray;
           
            /*
            $finalArray = array();
            for($e = 0; $e < count($idSet); $e++){
                $retProd = TRUE;
                $prodQuery = mysqli_query($connection, "SELECT * FROM produto WHERE id_produto = ".$idSet[$e]);
                while($prodRow = mysqli_fetch_array($prodQuery)){
                    for($i = 0; $i < count($wordSet); $i++){
                        if((mb_stripos($prodRow['nome_prod'], $wordSet[$i]) == NULL) && (mb_stripos($prodRow['tags'], $wordSet[$i]) == NULL)){
                            $_SESSION['mainInfo2'] = "<br>Inside IF<br>";
                            $retProd = FALSE;
                            break 2;
                        }else{
                            $_SESSION['mainInfo1'] = "<br>Inside ELSE<br>";
                        }
                    }
                }
                if($retProd){
                    array_push($finalArray, $idSet[e]);
                }
            }
            return $finalArray;
             */
            //VOCÊ ESTÁ AQUI LUCAS----------------------------------------------
            
            $_SESSION['strTest'] = $testString;
            if($categHandle == "todas"){
                $_SESSION['categHandleT'] = $_POST['categHandle'];
                
                If($searchBy == "NT"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }elseif($searchBy == "N"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }else/*T*/{
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }
            }else/*ESPEC*/{
                $_SESSION['categHandleT'] = $_POST['categHandle'];
                if($searchBy == "NT"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }elseif($searchBy == "N"){
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }else/*T*/{
                    $_SESSION['searchByT'] = $_POST['searchBy'];
                    
                }
            }
        }
    }
    
    function searchByCatgs($connection, $elements, $categories){
        
    }
    
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }