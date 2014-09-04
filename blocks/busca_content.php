<script>
    function checkBoxById(id){
        var status = document.getElementById(id).checked;
        if(status === false){
            document.getElementById(id).checked = true;
        }else{
            document.getElementById(id).checked = false;
        }
    }
</script>
<div style="display: table; margin: auto;">
    <div>
        <p>Pesquisa Avançada</p>
        
    </div>
    <div>
        <form method="post" enctype="multipart/form-data" action="dbScripts/advSearch.php">
            <div style="float: left;">Palavras Chave: <input type="text" name="wordsString" id="wordSet" style="width: 300px;"/></div> 
            <div style="float: left; position: relative; top: -6px; left: 5px;">
                <div><input type="radio" name="searchtype" id="qdp" value="qdp" checked><label for="qdp">Qualquer destas palavras</label></div>
                <div><input type="radio" name="wordHandle" id="tep" value="tep"><label for="tep">Todas essas palavras</label></div>
            </div>
            <div>
                Procurar por: 
                <input type="checkbox" name="srchCol[]" id="srchCol_NP" value="nome_prod"/><label for="srchCol_NP">Nome</label>
                <input type="checkbox" name="srchCol[]" id="srchCol_T" value="tags"/><label for="srchCol_T">Tags</label>
                <input type="checkbox" name="srchCol[]" id="srchCol_P" value="produtor"/><label for="srchCol_P">Fabricante</label>
                <input type="checkbox" name="srchCol[]" id="srchCol_D" value="descricao"/><label for="srchCol_D">Descrição</label>
            </div>
            <div>
                <p>
                    <!--
                        Preparar um javaScript ou jQuery para manter oculto as opções de categorias, e exibi-las somente
                        se o usuário escolher a opção de especificar em quais categorias ele quer realizar a busca.
                    -->
                    Procurar nas Categorias: 
                    <input type="radio" name="categHandle" id="categHandleT" value="todas" checked><label for="categHandleT">Todas</label>
                    <input type="radio" name="categHandle" id="categHandleE" value="espec"><label for="categHandleE">Especificar</label>
                </p>
            </div>
            <div>
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
        </form>
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
        
        if(isset($_SESSION['mainInfo'])){
            echo $_SESSION['mainInfo'];
        }
        if(isset($_SESSION['mainInfo1'])){
            echo $_SESSION['mainInfo1'];
        }
        if(isset($_SESSION['mainInfo2'])){
            echo $_SESSION['mainInfo2'];
        }
        if(isset($_SESSION['mainInfo3'])){
            echo $_SESSION['mainInfo3'];
        }
        if(isset($_SESSION['mainInfo4'])){
            echo $_SESSION['mainInfo4'];
        }
        
    ?>
    <br>
    <a href="sessionDestroy.php">Destruir sessão.</a>
</div>
<span style="clear: right;"></span>