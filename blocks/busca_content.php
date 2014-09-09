<div style="display: table; margin: auto;">
    <div>
        <p>Pesquisa Avançada</p>
        
    </div>
    <div>
        <form name="search" method="post" enctype="multipart/form-data" action="dbScripts/advSearch.php" onsubmit="return validateValue('wordSet', 'warn01')">
            <div style="float: left;">
                Palavras Chave: <input type="text" name="wordsString" id="wordSet" style="width: 300px;"/><br>
                <samp style="color: red;" id="warn01"></samp>
            </div>
            <div style="float: left; position: relative; top: -6px; left: 5px;">
                <div><input type="radio" name="searchType" id="qdp" value="qdp" checked><label for="qdp">Qualquer destas palavras</label></div>
                <div><input type="radio" name="searchType" id="tep" value="tep"><label for="tep">Todas essas palavras</label></div>
            </div>
            
            <!-- Tivemos um erro semântigo no script da busca.
            Até termos tempo para desenvolver uma nova solução para esta parte do sistema,
            não usaremos esta parte do código. U.U -->
            <div style="display: none;">
                Procurar por: 
                <input type="checkbox" name="searchCol[]" id="srchCol_NP" value="nome_prod" checked/><label for="srchCol_NP">Nome</label>
                <input type="checkbox" name="searchCol[]" id="srchCol_T" value="tags" checked/><label for="srchCol_T">Tags</label>
                <input type="checkbox" name="searchCol[]" id="srchCol_P" value="produtor"/><label for="srchCol_P">Fabricante</label>
                <input type="checkbox" name="searchCol[]" id="srchCol_D" value="descricao" /><label for="srchCol_D">Descrição</label>
            </div>
            <!-- Depois daqui, ta normal. -->
            
            <div style="clear: both;">
                <p>
                    Procurar nas Categorias: 
                    <input type="radio" name="categHandle" id="categHandleT" value="todas" checked onclick="catListhide()"><label for="categHandleT">Todas</label>
                    <input type="radio" name="categHandle" id="categHandleE" value="espec"><label for="categHandleE">Especificar</label>
                </p>
            </div>
            <div id="checkBoxes">
                <table>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="5" value="5"><label for="5">Celulares/Smartphones</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="14" value="14"><label for="14">Jogos</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="12" value="12"><label  for="12">Automação Comercial</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="1" value="1"><label for="1">Notebooks/Ultrabooks</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="7" value="7"><label for="7">PC/Desktop</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="31" value="31"><label for="31">Armazenamento</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="6" value="6"><label for="6">Consoles e Acessórios</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="30" value="30"><label for="30">Teclados</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="28" value="28"><label for="28">Fones/Headphones/Headsets</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="4" value="4"><label for="4">Energia/Alimentação</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="29" value="29"><label for="29">Mouses</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="2" value="2"><label for="2">Impressoras/Multifuncionais</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="15" value="15"><label for="15">Tablets e Acessórios</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="11" value="11"><label for="11">Suprimentos</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="21" value="21"><label for="21">Mini-System's/Rádios/MP3/MP4</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="8" value="8"><label for="8">Telas/Monitores/TVs</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="17" value="17"><label for="17">GPS</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="25" value="25"><label for="25">Iluminação/Lanternas</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="3" value="3"><label for="3">Datashows/Projetores</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="24" value="24"><label for="24">Conversores</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="19" value="19"><label for="19">Blu-Ray's/DVD Player</label>s
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="22" value="22"><label for="22">Som/Home Theater</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="26" value="26"><label for="26">Adaptadores</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="20" value="20"><label for="20">Calculadoras e afins</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="9" value="9"><label for="9">Peças/Componentes</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="23" value="23"><label for="23">Antenas e afins</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="18" value="18"><label for="18">Câmeras/Filmadoras</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="10" value="10"><label for="10">Redes/LAN/Wireless</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="13" value="13"><label for="13">Telefonia Fixa</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="16" value="16"><label for="16">Artigos Automotivos</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="27" value="27"><label for="27">Cabos/Extensõe</label>s
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="32" value="32"><label for="32">Perfumes</label>
                        </td>
                        <td>
                            <input type="checkbox" name="codCategoria[]" id="33" value="33"><label for="33">Outros</label>
                        </td>
                    </tr>
                </table>
            </div>
            <div>
                <input type="submit" value="Buscar"/>
            </div>
        </form>
        <button name="testKeywords" onclick="validateKeywords()">Validar Keywords</button>
    </div>
    <br>
    <?php

        include 'dbScripts/dbConnect.php';
        include 'dbScripts/dbDisconect.php';
        
        if(isset($_SESSION['searchResult'])){
            echo'<br>';
            $prodToDisplay = $_SESSION['searchResult'];
            for($i = 0; $i < count($prodToDisplay); $i++){
                $sqlQuery = "SELECT * FROM produto WHERE id_produto = ".$prodToDisplay[$i];
                $queryResult = mysqli_query($dbCon, $sqlQuery);
                $row = mysqli_fetch_array($queryResult);
                echo $row['nome_prod'].'<br>';
            }
        }
        
        if(isset($_SESSION['idArray'])){
            $idSet = $_SESSION['idArray'];
            $ids = "";
            for($i = 0; $i < (count($idSet) - 1); $i++){
                $ids = $ids.$idSet[$i].", ";
            }
            $count = count($idSet) - 1;
            $ids = $ids.$idSet[$count].")";
            $sqlQuery = "SELECT * FROM produto WHERE id_produto IN (".$ids;
            $result = mysqli_query($dbCon, $sqlQuery);
            echo"<table><tr><td>Nome do Produto</td><td>Fabricante</td><td>Tags</td><tr>";
            while($row = mysqli_fetch_array($result)){
                echo"<tr><td>".$row['nome_prod']."</td><td>".$row['produtor']."</td><td>".$row['tags']."</td><tr>";
            }
            echo"</table><br>";
        }
    ?>
    <br>
    <p id="tests"></p>
    <a href="sessionDestroy.php">Destruir sessão.</a>
</div>
<span style="clear: right;"></span>
<script>
    document.getElementById('checkBoxes').style.display = "none";
    document.getElementById('categHandleE').addEventListener("click", function(){document.getElementById("checkBoxes").style.display = "block"})
    document.getElementById('categHandleT').addEventListener("click", function(){document.getElementById("checkBoxes").style.display = "none"})
    var fieldToValidate = ["wordsString", ];
</script>