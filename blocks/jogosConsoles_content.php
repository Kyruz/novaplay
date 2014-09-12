<?php
    include 'dbScripts/dbConnect.php';
    include 'dbScripts/dbDisconect.php';
?>
<style>
    div.topBox{
        background-color: #F8F8F8;
        display: table;
        margin: auto;
        padding: 5px;
        border: 2px solid #DFDFDF;
    }
</style>
<div>
    <div id="divContent">
        <div class="topBox">
            <div id="divLeftMenu">
                <a href="jogosConsoles.php?subCat=jogosCons" style="text-decoration: none;">
                    <div class="genericBar" style="width: 250px; margin: 0 5px 10px 0;"><div class="leftMenuTitle">Jogos e Consoles</div></div>
                </a>
                <div id="accordion">
                    <a href="#" class="subCatBtnBar">Consoles e Acessórios</a>
                    <div>
                        <a href="jogosConsoles.php?subCat=consAcesPS4"><p class="subCatLink">Playstation 4</p></a>
                        <a href="jogosConsoles.php?subCat=consAcesPS3"><p class="subCatLink">Playstation 3</p></a>
                        <a href="jogosConsoles.php?subCat=consAcesXboxOne"><p class="subCatLink">Xbox One</p></a>
                        <a href="jogosConsoles.php?subCat=consAcesXbox360"><p class="subCatLink">Xbox 360</p></a>
                    </div>
                    <a href="#" class="subCatBtnBar">Jogos</a>
                    <div>
                        <a href="jogosConsoles.php?subCat=jogosPS4"><p class="subCatLink">Playstation 4</p></a>
                        <a href="jogosConsoles.php?subCat=jogosPS3"><p class="subCatLink">Playstation 3</p></a>
                        <a href="jogosConsoles.php?subCat=jogosXboxOne"><p class="subCatLink">Xbox One</p></a>
                        <a href="jogosConsoles.php?subCat=jogosXbox360"><p class="subCatLink">Xbox 360</p></a>
                    </div>
                    <a href="#" class="subCatBtnBar">Outros Consoles</a>
                    <div>
                        <a href=""><p class="subCatLink">Nintendo Wii U</p></a>
                        <a href=""><p class="subCatLink">Playstation 2</p></a>
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
        <div class="genericBar" style="height: 20px;"></div>
        <div class="topBox">
            <?php 
            if(isset($_GET['subCat'])){
                include 'dbScripts/preDefSearch/'.$_GET['subCat'].'.php';
            }else{
                include 'dbScripts/preDefSearch/jogosCons.php';
            }
            ?>
        </div>
    </div>
</div>