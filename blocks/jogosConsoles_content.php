
<div id="prodMainDiv" style="display: table; margin: auto;">
    <?php
        include 'dbScripts/dbConnect.php';
    ?>
    <div id="prodUpper" style="background-color: #fff;">
        <div id="subCatList" style="float: left; background-color: #fff; width: 250px;">
             <h2>Jogos e Consoles</h2>
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
        <div id="prodSlides" style="overflow: hidden; background-color: #ccc; height: 300px;">
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
                <div id="htmlcaption" style="display: none;">
                    <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
                </div>
            </div>
        </div>
    </div>
</div>