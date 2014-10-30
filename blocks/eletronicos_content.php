<?php
    include 'dbScripts/dbConnect.php';
    include 'dbScripts/dbDisconect.php';
    if(isset($_GET['unsetPA'])){
        if($_GET['unsetPA'] == 1){
            unset($_SESSION['prodArray']);
            unset($_GET['unsetPA']);
        }
    }
?>
<div>
    <div id="divContent">
        <div class="topBox">
            <div style="display: table; margin: auto;">
                <div id="divLeftMenu">
                    <a href="eletronicos.php?unsetPA=1&listProds=0" style="text-decoration: none;">
                        <div class="genericBar" style="width: 250px; margin: 0 5px 10px 0;"><div class="leftMenuTitle">Eletrônicos</div></div>
                    </a>
                    <div id="accordion">
                        <a href="#" class="subCatBtnBar">Multi-media</a>
                        <div>
                            <a href="eletronicos.php?unsetPA=1&listProds=1"><p class="subCatLink">Televisões</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=2"><p class="subCatLink">Blu-Ray / DVD Player</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=3"><p class="subCatLink">Home Theater</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=4"><p class="subCatLink">Câmeras Digitais</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=5"><p class="subCatLink">Filmadoras</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=6"><p class="subCatLink">Rádios / Mini System / MP3 / MP4</p></a>
                        </div>
                        <a href="#" class="subCatBtnBar">Outros Equipamentos</a>
                        <div>
                            <a href="eletronicos.php?unsetPA=1&listProds=7"><p class="subCatLink">Telefonia Fixa</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=8"><p class="subCatLink">Antenas</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=9"><p class="subCatLink">Conversores Digitais</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=10"><p class="subCatLink">Calculadoras</p></a>
                            <a href="eletronicos.php?unsetPA=1&listProds=11"><p class="subCatLink">Lanternas</p></a>
                        </div>
                    </div>
                </div>
                <div id="divSlides">
                    <div id="sliderFrame">
                        <div id="slider">
                            <a href="pgTest.php" target="_blank">
                                <img src="images/wolfenstein.png" alt="Wolfenstein: The new Order R$ 160,00" />
                            </a>
                            <img src="images/watchdogs.png" alt="Watchdogs" />
                            <img src="images/theLastOfUs.png" alt="The Last of Us" />
                            <img src="images/ps4.png" alt="Playstation 4 de 500GB por R$ 1700,00" />
                            <img src="images/xboxOne.png" alt="Xbox One e Xbox 360" />                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="genericBar" style="height: 20px;"></div>
        <div class="topBox">
            <?php
            /* Aqui checa-se qual produtos devem ser buscados no sistema, e gera-se
             * a query adequada para tal. Para cada caso, usamos um include para buscar
             * o script que gera a query. O motivo, é para reutilização da mesma query
             * em diversas partes do site.
             */
            if(isset($_GET['listProds'])){
                switch (intval($_GET['listProds'])){
                    case 1:
                        include 'dbScripts/preDefSearch/mkQueryTVs.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 2:
                        include 'dbScripts/preDefSearch/mkQueryBluRayDVD.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 3:
                        include 'dbScripts/preDefSearch/mkQueryHomeTheater.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 4:
                        include 'dbScripts/preDefSearch/mkQueryDigiCam.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 5:
                        include 'dbScripts/preDefSearch/mkQueryFilmadoras.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 6:
                        include 'dbScripts/preDefSearch/mkQueryRadMinSysMPs.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 7:
                        include 'dbScripts/preDefSearch/mkQueryTelFixa.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 8:
                        include 'dbScripts/preDefSearch/mkQueryAntenas.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 9:
                        include 'dbScripts/preDefSearch/mkQueryConversDigi.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 10:
                        include 'dbScripts/preDefSearch/mkQueryCalcs.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 11:
                        include 'dbScripts/preDefSearch/mkQueryLanternas.php';
                        unset($_SESSION['prodArray']);
                        break;
                    default :
                        include 'dbScripts/preDefSearch/mkQueryAllEletr.php';
                        unset($_SESSION['prodArray']);
                }
            }else{
                $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', false, 'cod_categoria, nome_prod');
            }
            
            /* Aqui é feita a listagem dos produtos da categoria principal e subcategorias,
             * ou faz a consulta da categoria principal e a exibibe, caso não detecte nenhuma
             * pronta para ser exibida.
             */
            if(isset($_SESSION['prodArray'])){
                $_GET['prodListIndex'] = listNextProds($_SESSION['prodArray'], $_GET['prodListIndex'], 30);
            }else{
                //$newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria IN (6, 14)', 'cod_categoria, nome_prod');
                $_SESSION['prodArray'] = runQuery($dbCon, $newQuery, ["id_produto", "nome_prod", "preco"]);
                $_GET['prodListIndex'] = listNextProds($_SESSION['prodArray'], 0, 30);
            }
            
            /* Aqui gera-se os links de navegação entre os resultados da consulta. */
            echo '<div style="display: table; margin: auto;">';
            if(isset($_SESSION['prodArray'])){
                mkNavLinks(count($_SESSION['prodArray']), 30, 'prodListIndex', 'eletronicos.php');
            }
            echo '</div>';
            ?>
        </div>
    </div>
</div>