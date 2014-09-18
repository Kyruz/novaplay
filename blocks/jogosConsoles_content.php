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
                    <a href="jogosConsoles.php?unsetPA=1&listProds=0" style="text-decoration: none;">
                        <div class="genericBar" style="width: 250px; margin: 0 5px 10px 0;"><div class="leftMenuTitle">Jogos e Consoles</div></div>
                    </a>
                    <div id="accordion">
                        <a href="#" class="subCatBtnBar">Consoles e Acessórios</a>
                        <div>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=1"><p class="subCatLink">Playstation 4</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=2"><p class="subCatLink">Playstation 3</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=3"><p class="subCatLink">Xbox One</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=4"><p class="subCatLink">Xbox 360</p></a>
                        </div>
                        <a href="#" class="subCatBtnBar">Jogos</a>
                        <div>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=5"><p class="subCatLink">Playstation 4</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=6"><p class="subCatLink">Playstation 3</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=7"><p class="subCatLink">Xbox One</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=8"><p class="subCatLink">Xbox 360</p></a>
                        </div>
                        <a href="#" class="subCatBtnBar">Outros Consoles</a>
                        <div>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=9"><p class="subCatLink">Nintendo Wii U</p></a>
                            <a href="jogosConsoles.php?unsetPA=1&listProds=10"><p class="subCatLink">Playstation 2</p></a>
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
                        include 'dbScripts/preDefSearch/mkQueryConAcesPS4.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 2:
                        include 'dbScripts/preDefSearch/mkQueryConAcesPS3.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 3:
                        include 'dbScripts/preDefSearch/mkQueryConAcesXboxOne.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 4:
                        include 'dbScripts/preDefSearch/mkQueryConAcesXbox360.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 5:
                        include 'dbScripts/preDefSearch/mkQueryJogosPS4.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 6:
                        include 'dbScripts/preDefSearch/mkQueryJogosPS3.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 7:
                        include 'dbScripts/preDefSearch/mkQueryJogosXboxOne.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 8:
                        include 'dbScripts/preDefSearch/mkQueryJogosXbox360.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 9:
                        include 'dbScripts/preDefSearch/mkQueryNintendoWiiU.php';
                        unset($_SESSION['prodArray']);
                        break;
                    case 10:
                        include 'dbScripts/preDefSearch/mkQueryTudoPS2.php';
                        unset($_SESSION['prodArray']);
                        break;
                    default :
                        include 'dbScripts/preDefSearch/mkQueryConAcesAll.php';
                        unset($_SESSION['prodArray']);
                }
            }else{
                $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'cod_categoria IN (6, 14)', 'cod_categoria, nome_prod');
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
                mkNavLinks(count($_SESSION['prodArray']), 30, 'prodListIndex', 'jogosConsoles.php');
            }
            echo '</div>';
            ?>
        </div>
    </div>
</div>