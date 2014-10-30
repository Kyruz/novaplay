<div class="midStruct">
    <?php
        
        include 'dbScripts/dbConnect.php';
        include 'dbScripts/dbDisconect.php';
        
        $xml=simplexml_load_file("produtos/370/data.xml");
        $prodID = $xml->id;
        $categoria = $xml->categoria;
        
        $prodQuery = mysqli_query($dbCon, "SELECT * FROM produto WHERE id_produto =".$prodID."");
        $prodData = mysqli_fetch_array($prodQuery);
        
        $prodName = $prodData['nome_prod'];
        $produtor = $prodData['produtor'];
        $precoNorm = $prodData['preco'];
        $descBlt = $prodData['desc_blt'];
        $qdtEstoque = $prodData['qtd_estoque'];
        $tags = $prodData['tags'];
        $prodDesc = $prodData['descricao'];
        $prodCode = $prodData['codigo_prod'];
        $pack_peso = $prodData['pack_peso'];
        $pack_altura = $prodData['pack_altura'];
        $pack_larg= $prodData['pack_larg'];
        $pack_compr= $prodData['pack_compr'];
        
        $PrecoBlt = $precoNorm - ($precoNorm*$descBlt);
        
        dbDisconect($dbCon);
        
    ?>
    <input id="prodID" type="text" hidden value="<?php echo $prodID; ?>"/>
    <div class="midProdUpper">
        <div class="midProdUL">
            <div class="midprodFotos">
                <div style="display: table; margin-top: 3px; margin-left: auto; margin-right: auto; min-height: 450px;">
                    <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                    <a id="bigImg" href="<?php echo"produtos/".$xml->id."/media/b_".$xml->cover; ?>">
                        <img id="propImg" src="<?php echo"produtos/".$xml->id."/media/".$xml->cover; ?>" style="vertical-align: middle;">
                    </a>
                </div>
                <div class="fotosSmall" style="margin-top: 3px; height: 106px;">
                    <div style="float: left; min-height: 100px;">
                        <a onclick="changeImg('cover')">
                            <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                            <img src="<?php echo"produtos/".$xml->id."/media/s_".$xml->cover; ?>" style="vertical-align: middle;"/>
                        </a>
                    </div>
                    <div style="float: left; min-height: 100px; display: table;">
                        <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                        <a onclick="changeImg('img1')">
                            <img src="<?php echo"produtos/".$xml->id."/media/s_".$xml->img1; ?>" style="vertical-align: middle;"/>
                        </a>
                    </div>
                    <div style="float: left; min-height: 100px; display: table;">
                        <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                        <a onclick="changeImg('img2')">
                            <img src="<?php echo"produtos/".$xml->id."/media/s_".$xml->img2; ?>" style="vertical-align: middle;"/>
                        </a>
                    </div>
                    <div style="float: left; min-height: 100px; display: table;">
                        <span style="display: inline-block; height: 100%; vertical-align: middle;"></span>
                        <a onclick="changeImg('img3')">
                            <img src="<?php echo"produtos/".$xml->id."/media/s_".$xml->img3; ?>" style="vertical-align: middle;"/>
                        </a>
                    </div>
                </div>
            </div>
            <div class="midprodVideo">
                <iframe width="560" height="315" src="<?php echo $xml->videoURL; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="midProdUR">
            <div class="midBuyProd">
                <div style="padding: 0 10px 0 10px;">
                    <p style="margin: 0em; font-size: 20px;"><?php echo ucfirst($prodName); ?></p>
                    <samp style="margin: 0em; font-size: 12px;"><?php echo $categoria." ".$tags; ?></samp>
                    <br><br>
                    <samp>R$ <?php echo $PrecoBlt; ?></samp><samp> À vista no boleto</samp>
                    <div style="margin: 0px; padding: 0px;">
                        <ul class="parcelamento">
                            <li>
                                <samp>R$ <?php echo $precoNorm; ?> em 1x no cartão Mais >></samp>
                                <ul class="parcelas">
                                    <li>2x de R$ 888,88</li>
                                    <li>3x de R$ 888,88</li>
                                    <li>4x de R$ 888,88</li>
                                    <li>5x de R$ 888,88</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <br><br>
                    <div style="display: table; text-align: center;">
                        <a href="#" target="#frete" style="text-align: center;">
                            <img src="media/img/freteIcon.png"/>
                            <br>
                            Calcular frete
                        </a>
                    </div>
                    <div style="display: table; float: right; clear: both; font-size: 18px; padding: 5px;">
                    <?php
                        if($qdtEstoque > 0){
                            echo'<button>Comprar</button>';
                        }else{
                            echo'<button>Encomendar</button>';
                        }
                    ?>
                    </div>
                    <br>
                    <?php
                        if($qdtEstoque > 0){
                            echo"Quantidade em estoque: ".$qdtEstoque." unidades.<br>";
                        }else{
                            echo"Produto ausente em estoque.";
                        }
                    ?>
                </div>
            </div>
            <div id="accordion" style="width: 500px;">
                <h3>Sobre <?php echo $prodName; ?></h3>
                <div>
                    <p>
                        <?php echo $prodDesc; ?>
                    </p>
                </div>
                <h3>Especificações</h3>
                <div class="midProdSpec">
                    <p>midProdSpec</p>
                    <p>Informações específicas. A explorar possibilidades de uso e construção.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="midFreteBar">
        <div style="display: table; margin: auto;">
            <form action="generalScripts/calcFrete.php" method="post">
                <input type="text" hidden name="sCepOrigem" id="sCepOrigem" value="89802110">
                <input type="text" hidden name="nVlPeso" id="nVlPeso" value="<?php echo"$pack_peso"; ?>">
                <input type="text" hidden name="nVlComprimento" id="nVlComprimento" value="<?php echo"$pack_compr"; ?>">
                <input type="text" hidden name="nVlAltura" id="nVlAltura" value="<?php echo"$pack_altura"; ?>">
                <input type="text" hidden name="nVlLargura" id="nVlLargura" value="<?php echo"$pack_larg"; ?>">
                <p id="frete">Calcule seu frete!</p>
                <table>
                    <tr>
                        <td>
                            CEP: 
                        </td>
                        <td>
                            <input type="text" name="sCepDestino" id="sCepDestino">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Forma de entrega:
                        </td>
                        <td>
                            <select name="nCdServico">
                                <option value="41106">PAC</option>
                                <option value="40010">SEDEX</option>
                                <option value="40215">SEDEX 10</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Calcular">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="midProdBot">
        midProdBot
    </div>
</div>
<script>
    defLoc = "produtos/" + document.getElementById("prodID").value + "/";
    
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", defLoc + "data.xml", false);
    xmlhttp.send();
    xmlDoc = xmlhttp.responseXML;
    
    function changeImg(imgLoc){
        document.getElementById("propImg").src = defLoc + "media/" + xmlDoc.getElementsByTagName(imgLoc)[0].childNodes[0].nodeValue;
        document.getElementById("bigImg").href = defLoc + "media/b_" + xmlDoc.getElementsByTagName(imgLoc)[0].childNodes[0].nodeValue;
    }
</script>
<script src="js-global/FancyZoom.js" type="text/javascript"></script>
<script src="js-global/FancyZoomHTML.js" type="text/javascript"></script>