<!DOCTYPE html>
<!-------------------------------------------------
|Desenvolvido por Lucas Carvalho Flores           |
|Contao: (49) 9818 1022 eclipsekyruz@gmail.com    |
--------------------------------------------------
|Developed by Lucas Carvalho Flores               |
|Contact: +55 49 9818 1022 eclipsekyruz@gmail.com |
-------------------------------------------------->
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Novaplay</title>
        <link rel="stylesheet" type="text/css" href="css/admStyle.css">
        <link rel="shortcut icon" href="media/img/favicon.png" />
    </head>
    <body>
        <div class="pagina">
            <div class="mainStruc">
                <div>
                    <p class="title">Cadastrar Produto</p>
                    <?php
                        if(!empty($_GET['message'])){
                            if($_GET['message'] == 1){
                                echo"<p class='sysMessage'>Produto cadastrado com sucesso. </p>";
                            }elseif($_GET['message'] == 2){
                                echo"<p class='sysWarning'>Erro ao tentar cadastrar produto. Há dados inválidos no formuláfio. ";
                            }elseif($_GET['message'] == 3){
                                echo"<p class='sysWarning'>Erro interno impediu o cadastro de ser efetuado. Contactar o administrador do systema. ";
                            }
                        }
                    ?>
                </div>
                <div class="contentBlock">
                    <div style="float: left; width: 50%;">
                        <p class="title">Dados do Produto</p>
                    </div>
                    <div style="float: left; width: 50%;">
                        <p class="title">Mídia do Produto</p>
                    </div>
                    <form action="dbScripts/cadProd.php" method="POST" enctype="multipart/form-data">
                        <table style="float: left;">
                            <tr>
                                <td>
                                    Nome:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['nome'])){
                                            echo"<input type='text' name='nome' value='".$_GET['nome']."'>";
                                        }else{
                                            echo"<input type='text' name='nome' >";
                                        }
                                        if(!empty($_GET['nomeErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['nomeErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Código:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['codigo'])){
                                            echo"<input type='text' name='codigo' value='".$_GET['codigo']."'>";
                                        }else{
                                            echo"<input type='text' name='codigo' >";
                                        }
                                        if(!empty($_GET['codigoErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['codigoErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Categoria:
                                </td>
                                <td style="padding-bottom: 15px; padding-top: 10px;">
                                    <table>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="5"){echo"checked";}} ?> name="codCategoria" value="5">Celulares/Smartphones
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="14"){echo"checked";}} ?> name="codCategoria" value="14">Jogos
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="12"){echo"checked";}} ?> name="codCategoria" value="12">Automação Comercial
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="1"){echo"checked";}} ?> name="codCategoria" value="1">Notebooks/Ultrabooks
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="7"){echo"checked";}} ?> name="codCategoria" value="7">PC/Desktop
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="31"){echo"checked";}} ?> name="codCategoria" value="31">Armazenamento
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="6"){echo"checked";}} ?> name="codCategoria" value="6">Consoles e Acessórios
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="30"){echo"checked";}} ?> name="codCategoria" value="30">Teclados
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="28"){echo"checked";}} ?> name="codCategoria" value="28">Fones/Headphones/Headsets
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="4"){echo"checked";}} ?> name="codCategoria" value="4">Energia/Alimentação
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="29"){echo"checked";}} ?> name="codCategoria" value="29">Mouses
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="2"){echo"checked";}} ?> name="codCategoria" value="2">Impressoras/Multifuncionais
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="15"){echo"checked";}} ?> name="codCategoria" value="15">Tablets e Acessórios
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="11"){echo"checked";}} ?> name="codCategoria" value="11">Suprimentos
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="21"){echo"checked";}} ?> name="codCategoria" value="21">Mini-System's/Rádios/MP3/MP4
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="8"){echo"checked";}} ?> name="codCategoria" value="8">Telas/Monitores/TVs
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="17"){echo"checked";}} ?> name="codCategoria" value="17">GPS
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="25"){echo"checked";}} ?> name="codCategoria" value="25">Iluminação/Lanternas
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="3"){echo"checked";}} ?> name="codCategoria" value="3">Datashows/Projetores
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="24"){echo"checked";}} ?> name="codCategoria" value="24">Conversores
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="19"){echo"checked";}} ?> name="codCategoria" value="19">Blu-Ray's/DVD Players
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="22"){echo"checked";}} ?> name="codCategoria" value="22">Som/Home Theater
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="26"){echo"checked";}} ?> name="codCategoria" value="26">Adaptadores
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="20"){echo"checked";}} ?> name="codCategoria" value="20">Calculadoras e afins
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="9"){echo"checked";}} ?> name="codCategoria" value="9">Peças/Componentes
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="23"){echo"checked";}} ?> name="codCategoria" value="23">Antenas e afins
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="18"){echo"checked";}} ?> name="codCategoria" value="18">Câmeras/Filmadoras
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="10"){echo"checked";}} ?> name="codCategoria" value="10">Redes/LAN/Wireless
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="13"){echo"checked";}} ?> name="codCategoria" value="13">Telefonia Fixa
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="16"){echo"checked";}} ?> name="codCategoria" value="16">Artigos Automotivos
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="27"){echo"checked";}} ?> name="codCategoria" value="27">Cabos/Extensões
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="32"){echo"checked";}} ?> name="codCategoria" value="32">Perfumes
                                            </td>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="33"){echo"checked";}} ?> name="codCategoria" value="33">Outros
                                            </td>
                                            <tr>
                                            <td>
                                                <input type="radio" <?php if(!empty($_GET['categoria'])){if($_GET['categoria']=="34"){echo"checked";}} ?> name="codCategoria" value="34">Armazenamento Dados
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                                
                                            </td>
                                        </tr>
                                        </tr>
                                    </table>
                                    <?php
                                        if(!empty($_GET['categoriaErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['categoriaErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Preço:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['preco'])){
                                            echo"<input type='text' name='preco' value='".$_GET['preco']."'>";
                                        }else{
                                            echo"<input type='text' name='preco' >";
                                        }
                                        if(!empty($_GET['precoErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['precoErr']."</samp>";
                                        }
                                        echo " . Desconto no boleto: ";
                                        if(!empty($_GET['desc_blt'])){
                                            echo"<input size='5' type='text' name='desc_blt' value='".$_GET['desc_blt']."'>";
                                        }else{
                                            echo"<input size='5' type='text' name='desc_blt' >";
                                        }
                                        if(!empty($_GET['desc_bltErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['desc_bltErr']."</samp>";
                                        }
                                    ?>
                                    %
                                    <br>
                                    <samp style="font-size: 12px;">*use pontos para separar a parte inteira da decimal. Ex: 100.25</samp>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Fabricante / Produtor:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['produtor'])){
                                            echo"<input type='text' name='produtor' value='".$_GET['produtor']."'>";
                                        }else{
                                            echo"<input type='text' name='produtor' >";
                                        }
                                        if(!empty($_GET['produtorErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['produtorErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Quantidade Inicial:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['quantidade'])){
                                            echo"<input type='text' name='quantidade' value='".$_GET['quantidade']."'>";
                                        }else{
                                            echo"<input type='text' name='quantidade' >";
                                        }
                                        if(!empty($_GET['quantidadeErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['quantidadeErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Informação Adicional:
                                </td>
                                <td>
                                    <?php
                                        if(!empty($_GET['detalhes'])){
                                            echo"<input type='text' size='80' name='detalhes' value='".$_GET['detalhes']."'>";
                                        }else{
                                            echo"<input type='text' size='80' name='detalhes'>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tags do produto:
                                </td>
                                <td style="padding-top: 15px;">
                                    <?php
                                        if(!empty($_GET['tagList'])){
                                            $tagArray = explode(" ",$_GET['tagList']);
                                            if(in_array("1chip",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='1chip 1 chip'>1 Chip";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='1chip'>1 Chip";
                                            }
                                            if(in_array("2chips",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='2chips 2 chips'>2 Chips";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='2chips 2 chips'>2 Chips";
                                            }
                                            if(in_array("3chips",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='3chips 3 chips'>3 Chips";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='3chips 3 chips'>3 Chips";
                                            }
                                            if(in_array("ação",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='ação'>Ação";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='ação'>Ação";
                                            }
                                            if(in_array("aventura",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='aventura'>Aventura";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='aventura'>Aventura";
                                            }
                                            if(in_array("infantil",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='infantil'>Infantil";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='infantil'>Infantil";
                                            }
                                            echo"<br>";
                                            if(in_array("corrida",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='corrida'>Corrida";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='corrida'>Corrida";
                                            }
                                            if(in_array("tiro",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='tiro'>Tiro";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='tiro'>Tiro";
                                            }
                                            if(in_array("rpg",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='rpg'>RPG";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='rpg'>RPG";
                                            }
                                            if(in_array("esportes",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='esportes'>Esportes";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='esportes'>Esportes";
                                            }
                                            if(in_array("terror",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='terror'>Terror";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='terror'>Terror";
                                            }
                                            if(in_array("horror",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='horror'>Horror";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='horror'>Horror";
                                            }
                                            if(in_array("android",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='android'>Android";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='android'>Android";
                                            }
                                            echo"<br>";
                                            if(in_array("360",$tagArray) and in_array("xbox",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='xbox 360'>Xbox 360";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='xbox 360'>Xbox 360";
                                            }
                                            if(in_array("one",$tagArray) and in_array("xbox", $tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='xbox one'>Xbox One";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='xbox one'>Xbox One";
                                            }
                                            if(in_array("ps3",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='play ps3 playstation 3'>PS3";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='play ps3 playsation 3'>PS3";
                                            }
                                            if(in_array("ps4",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='play ps4 playstation 4'>PS4";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='play ps4 playstation 4'>PS4";
                                            }
                                            if(in_array("pc",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='pc desktop computador'>PC";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='pc desktop computador'>PC";
                                            }
                                            if(in_array("110v",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='110v'>110V";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='110v'>110V";
                                            }
                                            if(in_array("220v",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='220v'>220V";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='220v'>220V";
                                            }
                                            if(in_array("kinect",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='kinect'>Kinect";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='kinect'>Kinect";
                                            }
                                            echo"<br>";
                                            if(in_array("bateria",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='bateria'>Bateria";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='bateria'>Bateria";
                                            }
                                            if(in_array("ferramenta",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='ferramenta'>Ferramenta";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='ferramenta'>Ferramenta";
                                            }
                                            if(in_array("acessório",$tagArray)){
                                                echo"<input type='checkbox' checked name='tags[]' value='acessório acessórios'>Acessório";
                                            }else{
                                                echo"<input type='checkbox' name='tags[]' value='acessório acessorio acessórios acessorios'>Acessório";
                                            }
                                        }else{
                                            echo"<input type='checkbox' name='tags[]' value='1chip'>1 Chip";
                                            echo"<input type='checkbox' name='tags[]' value='2chips'>2 Chips";
                                            echo"<input type='checkbox' name='tags[]' value='3chips'>3 Chips";
                                            echo"<input type='checkbox' name='tags[]' value='ação'>Ação";
                                            echo"<input type='checkbox' name='tags[]' value='aventura'>Aventura";
                                            echo"<input type='checkbox' name='tags[]' value='infantil'>Infantil";
                                            echo"<br>";
                                            echo"<input type='checkbox' name='tags[]' value='corrida'>Corrida";
                                            echo"<input type='checkbox' name='tags[]' value='tiro'>Tiro";
                                            echo"<input type='checkbox' name='tags[]' value='rpg'>RPG";
                                            echo"<input type='checkbox' name='tags[]' value='esportes'>Esportes";
                                            echo"<input type='checkbox' name='tags[]' value='terror'>Terror";
                                            echo"<input type='checkbox' name='tags[]' value='horror'>Horror";
                                            echo"<input type='checkbox' name='tags[]' value='android'>Android";
                                            echo"<br>";
                                            echo"<input type='checkbox' name='tags[]' value='xbox 360'>Xbox 360";
                                            echo"<input type='checkbox' name='tags[]' value='xbox one'>Xbox One";
                                            echo"<input type='checkbox' name='tags[]' value='ps3 playstation_3'>PS3";
                                            echo"<input type='checkbox' name='tags[]' value='ps4 playstation_4'>PS4";
                                            echo"<input type='checkbox' name='tags[]' value='pc desktop computador'>PC";
                                            echo"<input type='checkbox' name='tags[]' value='110v'>110v";
                                            echo"<input type='checkbox' name='tags[]' value='220v'>220v";
                                            echo"<input type='checkbox' name='tags[]' value='kinect'>Kinect";
                                            echo"<br>";
                                            echo"<input type='checkbox' name='tags[]' value='bateria'>Bateria";
                                            echo"<input type='checkbox' name='tags[]' value='ferramenta'>Ferramenta";
                                            echo"<input type='checkbox' name='tags[]' value='acessório'>Acessório";
                                        }
                                    ?>
                                    
                                    <br>
                                    <br>
                                    Outras Tags:
                                    <br>
                                    <?php
                                        if(!empty($_GET['tags_outras'])){
                                            echo"<input type='text' name='tags_outras' value='".$_GET['tags_outras']."'>";
                                        }else{
                                            echo"<input type='text' name='tags_outras' >";
                                        }
                                    ?>
                                    <br>
                                    <samp style="font-size: 12px;">*Separar tags apenas por espaços.</samp>
                                    <br>
                                    <?php
                                        if(!empty($_GET['tagsErr'])){
                                            echo"<samp class='geralWarning'> ".$_GET['tagsErr']."</samp>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <input type="submit" value="Cadastrar Produto">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </table>
                        <div style="float: right;">
                            <br>
                            Capa:
                            <br>
                            <input type="file" name="cover">
                            <br><br>
                            Imagem 1:
                            <br>
                            <input type="file" name="img1">
                            <br><br>
                            Imagem 2:
                            <br>
                            <input type="file" name="img2">
                            <br><br>
                            Imagem 3:
                            <br>
                            <input type="file" name="img3">
                            <br><br>
                            Vídeo:
                            <br>
                            <input type="text" style="width: 300px" name="videoURL">
                            <br>
                            <samp style="font-size: 12px;">*coloque o link para o vídeo</samp>
                            <br><br>
                            <div style="display: table; margin: auto;">
                                <p class="title">Pacote de Envio</p>
                                <table>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="peso_relevante" id="peso_relevante" disabled=""> Peso(g): 
                                        </td>
                                        <td>
                                            <input type="text" name="pack_peso" id="pack_peso">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="altura_relevante" id="altura_relevante" disabled=""> Altura(cm): 
                                        </td>
                                        <td>
                                            <input type="text" name="pack_altura" id="pack_altura">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="larg_relevante" id="larg_relevante" disabled=""> Largura(cm): 
                                        </td>
                                        <td>
                                            <input type="text" name="pack_larg" id="pack_larg">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="compr_relevante" id="compr_relevante" disabled=""> Comprimento(cm): 
                                        </td>
                                        <td>
                                            <input type="text" name="pack_compr" id="pack_compr">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="horBar"></div>
                <div class="fullLenghtBlock">
                    <p>Produtos cadastrados:</p>
                    <!-- Lista os produtos atualmente cadastrados. Transformar em ferramenta de busca simples -->
                    <?php
                        include 'dbScripts/listProds.php';
                    ?>
                </div>
                <div style="margin: 10px;">
                    <a href="http://localhost/playstart_2/index.php">Voltar à pagina inicial</a>
                    . . . . . . . . . . . . . . . . . . .
                    <a href="pgTest.php">Pagina de testes</a>
                </div>
            </div>
        </div>
    </body>
</html>