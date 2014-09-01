            <?php
                include 'blocks/siteStart.php';
                include 'dbScripts/dbConnect.php';
                $prodIdArr = mysqli_fetch_array(mysqli_query($dbCon,"SELECT id_produto FROM produto order by id_produto DESC LIMIT 1"));
                $prodId = $prodIdArr[0];
                include 'blocks/top_content.php';
                include 'produtos/'.$prodId.'/main.php';
                include 'blocks/bot_content.php';
                include 'blocks/siteEnd.php'
            ?>