<?php
$query = "SELECT id_produto, nome_prod, produtor, preco, qtd_estoque FROM produto WHERE cod_categoria in (14, 6) ORDER BY cod_categoria, nome_prod";
if($result = mysqli_query($dbCon, $query)){
    $rowCount = 0;
    while($row = mysqli_fetch_array($result)){
        $prodXml = simplexml_load_file('produtos/'.$row['id_produto'].'/data.xml');
        echo'<a href="produto.php?prodID='.$row['id_produto'].'">';
        echo'<div class="prodSmallBlock">';
        echo'<img src="produtos/'.$row['id_produto'].'/media/s_'.$prodXml->cover.'"><br>';
        echo ucwords($row['nome_prod']);
        echo'</div>';
        echo'</a>';
        $rowCount += 1;
        if($rowCount >= 6){
            $rowCount = 0;
            echo'<br>';
        }
    }
}