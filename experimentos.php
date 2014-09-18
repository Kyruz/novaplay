            <?php
                include 'blocks/siteStart.php';
                include 'dbScripts/dbConnect.php';
                include 'blocks/top_content.php';
                if(isset($_GET['unsetPA'])){
                    if($_GET['unsetPA'] == 1){
                        unset($_SESSION['prodArray']);
                        unset($_GET['unsetPA']);
                    }
                }
            ?>
            
            <!-- Div com donteúdo -->
            <div id="divContent"
                 style="
                    display: table;
                    margin: 10px auto 10px auto;
                    background-color: #fff;
                    padding: 10px;
                    border: 1px solid #ddd;
                    -webkit-box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 1);
                    -moz-box-shadow:    2px 2px 5px 0px rgba(50, 50, 50, 1);
                    box-shadow:         2px 2px 5px 0px rgba(50, 50, 50, 1);
                 ">
            <!-- Div com conteúdo -->
                <div>
                    <div>
                        <a href="experimentos.php?subCat=genericSearch" class="subCatBtnBar">Jogos e Consoles</a>
                        <a href="experimentos.php?subCat=consAcesPS4" class="subCatBtnBar">Consoles e acess. de PS4</a>
                        <a href="experimentos.php?subCat=consAcesPS3" class="subCatBtnBar">Consoles e acess. de PS3</a><br>
                        <a href="experimentos.php?subCat=consAcesXbox360" class="subCatBtnBar">Consoles e acess. de Xbox 360</a>
                        <a href="experimentos.php?subCat=consAcesXboxOne" class="subCatBtnBar">Consoles e acess. de Xbox One</a>
                    </div>
                </div>
            <div class="genericBar" style="height: 20px; margin: 5px 0 5px 0;"></div>
            <div>
                <?php
                echo $newQuery = mkQuery('produto', 'id_produto, nome_prod, preco', 'id_produto > 0', 'cod_categoria, nome_prod');
                echo '<br>';
                runQuery($dbCon, $newQuery, 'prodArray', ["id_produto", "nome_prod", "preco"]);
                if(isset($_GET['pgCount'])){
                    $_SESSION['prodListIndex'] = listNextProds($_SESSION['prodArray'], $_GET['pgCount'], 30, ["id_produto", "nome_prod", "preco"]);
                }else{
                    $_SESSION['prodListIndex'] = listNextProds($_SESSION['prodArray'], 0, 30, ["id_produto", "nome_prod", "preco"]);
                }
                
                ?>
            </div>
            <div style="display: table; margin: auto;">
                <?php
                if(isset($_SESSION['prodArray'])){
                    mkNavLinks(count($_SESSION['prodArray']), 30);
                } 
                ?>
            </div>
            </div>
            <?php
                include 'blocks/bot_content.php';
                include 'blocks/siteEnd.php'
            ?>