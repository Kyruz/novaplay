            <?php
            
                if($_SERVER['REQUEST_METHOD'] == "GET"){
                    $prodID = $_GET['prodID'];
                }else{
                    $prodID = "prodPgErr";
                }
                
                include 'blocks/siteStart.php';
                include 'blocks/top_content.php';
                include 'produtos/'.$prodID.'/main.php';
                include 'blocks/bot_content.php';
                include 'blocks/siteEnd.php'
            ?>