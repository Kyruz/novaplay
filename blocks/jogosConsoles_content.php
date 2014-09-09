<?php
    include 'dbScripts/dbConnect.php';
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
    #leftMenuTitle{
        margin-top: 0px;
        line-height: 0px;
        color: rgb(255, 255, 255);
        background-color: #1B1BC3;
        font-size: 24px;
        padding: 20px;
        text-shadow: -1px 0px 2px rgba(170, 170, 170, 0.8);
        -webkit-box-shadow: 1px 1px 5px 0px rgba(50, 50, 50, 1);
        -moz-box-shadow:    1px 1px 5px 0px rgba(50, 50, 50, 1);
        box-shadow:         1px 1px 5px 0px rgba(50, 50, 50, 1);
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
    h3{
        color: #fff;
        background-image: url("images-global/acordBtn.png");
        background-repeat: no-repeat;
        padding: 5.5px;
        text-shadow: 1px 1px 2px rgba(70, 70, 70, 0.75);
    }
    p{
        text-indent: 20px;
    }
</style>
<div>
    <div id="divContent">
        <div id="divLeftMenu">
            <h2 id="leftMenuTitle">Jogos e Consoles</h2>
            <div id="accordion">
                <h3>Consoles e Acessórios</h3>
                <div>
                    <p>Playstation 4</p>
                    <p>Playstation 3</p>
                    <p>Xbox One</p>
                    <p>Xbox 360</p>
                </div>
                <h3>Jogos</h3>
                <div>
                    <p>Playstation 4</p>
                    <p>Playstation 3</p>
                    <p>Xbox One</p>
                    <p>Xbox 360</p>
                </div>
                <h3>Outros Consoles</h3>
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
        <div style="clear: both;">
            Aqui vem a consulta SQL.
        </div>
    </div>
</div>