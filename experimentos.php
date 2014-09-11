            <?php
                include 'blocks/siteStart.php';
                include 'dbScripts/dbConnect.php';
                include 'blocks/top_content.php';
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
                        if(isset($_GET['subCat'])){
                            include 'dbScripts/preDefSearch/'.$_GET['subCat'].'.php';
                        }
                        ?>
                </div>
            </div>
            <?php
                include 'blocks/bot_content.php';
                include 'blocks/siteEnd.php'
            ?>