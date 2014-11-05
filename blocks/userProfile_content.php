<div id="divContent" style="min-width: 900px;">
    <div class="genericBar" style="height: 20px;"></div>

    <div style="display: table; margin: 10px auto;">
        <?php
        if(isset($dbCon))
        {
            if(login_check($dbCon))
            {
                echo "You are loged in as ".$_SESSION['username']."<br>";
                echo "<a href='./dbScripts/secSession/logout.php'><button>Logout</button></a>";
            }else{ echo "Not loged in.";}
        }
        else
        {
            include_once "./dbScripts/secSession/dbCon.php";
            $dbCon = mysqli_connect(HOST_DOOR, USER, PASS, DATABASE);
            if(login_check($dbCon))
            {
                echo "You are loged in as ".$_SESSION['username']."<br>";
                echo "<a href='./dbScripts/secSession/logout.php'><button>Logout</button></a>";
            }else{ echo "Not loged in.";}
        }
        ?>
    </div>

    <div class="genericBar" style="height: 20px;"></div>
</div>