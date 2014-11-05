<div id="divContent" style="min-width: 900px;">
    
    <div class="genericBar" style="height: 20px;"></div>
    
    <div style="display: table; margin: 10px auto;">
        <form name="login" method="POST" action="./dbScripts/secSession/processLogin.php">
            <table>
                <tr>
                    <td>User Email: </td>
                    <td><input type="email" id="uEmailLog" name="email"/></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" id="pass2" name="pass"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Efetuar Login"/></td>
                </tr>
            </table>
        </form>
    </div>
    
    <br>
     <?php
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string']))
    {
        echo "You are loged in as ".$_SESSION['username']."<br>";
        echo "<a href='./dbScripts/secSession/logout.php'><button>Logout</button></a>";
    }
    ?>
    <br>
    <br>
    <a href="destroySession.php">Destroy Session</a><br>
    <a href="userProfile.php">Go to Profile Page</a>
    
    <div class="genericBar" style="height: 20px;"></div>
</div>
