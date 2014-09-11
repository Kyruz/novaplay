<?php
    include 'dbScripts/dbConnect.php';
    include 'dbScripts/dbDisconect.php';
?>
<style>
    #divContent{
        display: table;
        margin: 10px auto 10px auto;
        background-color: #fff;
        padding: 10px;
        border: 1px solid #ddd;
        -webkit-box-shadow: 2px 2px 5px 0px rgba(50, 50, 50, 1);
        -moz-box-shadow:    2px 2px 5px 0px rgba(50, 50, 50, 1);
        box-shadow:         2px 2px 5px 0px rgba(50, 50, 50, 1);
    }
    div.leftMenuTitle{
        display: table;
        margin: 10px auto 10px auto;
        color: #fff;
        font-weight: bold;
        font-size: 24px;
        text-shadow: 1px 1px 2px rgba(50, 50, 50, 1);
    }
    #divLeftMenu{
        float: left;
        width: 250px;
        height: 350px;
        padding-right: 10px;
    }
    #divSlides{
        float: left;
        height: 350px;
    }
    p{
        text-indent: 20px;
    }
</style>
<div>
    <div id="divContent">
        <div id="divLeftMenu">
            <a href="jogosConsoles.php?subCat=jogosCons" style="text-decoration: none;">
                <div class="genericBar" style="width: 250px; margin: 0 5px 10px 0;"><div class="leftMenuTitle">Jogos e Consoles</div></div>
            </a>
            <div id="accordion">
                <a href="#" class="subCatBtnBar">Consoles e Acessórios</a>
                <div>
                    <p><a href="jogosConsoles.php?subCat=consAcesPS4">Playstation 4</a></p>
                    <p><a href="jogosConsoles.php?subCat=consAcesPS3">Playstation 3</a></p>
                    <p><a href="jogosConsoles.php?subCat=consAcesXboxOne">Xbox One</a></p>
                    <p><a href="jogosConsoles.php?subCat=consAcesXbox360">Xbox 360</a></p>
                </div>
                <a href="#" class="subCatBtnBar">Jogos</a>
                <div>
                    <p><a href="jogosConsoles.php?subCat=jogosPS4">Playstation 4</a></p>
                    <p><a href="jogosConsoles.php?subCat=jogosPS3">Playstation 3</a></p>
                    <p><a href="jogosConsoles.php?subCat=jogosXboxOne">Xbox One</a></p>
                    <p><a href="jogosConsoles.php?subCat=jogosXbox360">Xbox 360</a></p>
                </div>
                <a href="#" class="subCatBtnBar">Outros Consoles</a>
                <div>
                    <p>Nintendo Wii U</p>
                    <p>Playstation 2</p>
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
        <div class="genericBar" style="height: 20px;"></div>
        <div>
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