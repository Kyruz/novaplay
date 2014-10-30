<?php
    include 'dbConnect.php';
    
    $listProd = mysqli_query($dbCon,"SELECT * FROM produto");
    echo"<table style='max-width: 850px;'><tr><td>ID</td><td>Nome</td><td>Preço</td><td>Fabricante</td><td>Estoque</td><td>Categoria</td><td>Descrição</td><td>Tags</td></tr>";
    while($row = mysqli_fetch_array($listProd)){
        echo "<tr>";
        echo "<td>".$row['id_produto']."</td>";
        echo "<td>".$row['nome_prod']."</td>";
        echo "<td>".$row['preco']."</td>";
        echo "<td>".$row['produtor']."</td>";
        echo "<td>".$row['qtd_estoque']."</td>";
        echo "<td>".$row['cod_categoria']."</td>";
        echo "<td>".$row['descricao']."</td>";
        echo "<td>".$row['tags']."</td>";
        echo "</tr>";
    }
    echo"</table>";