
<div id="divContent" style="min-width: 900px;">
    <div class="genericBar" style="height: 20px;"></div>
    <div style="display: table; margin: auto;">
        <div style="height: 400px; display: table-cell; vertical-align: middle; text-align: center;">
            <?php
            if(isset($_SESSION["info"])){
                echo $_SESSION["info"];
                unset($_SESSION["info"]);
            }else{
                echo "Ops!!<br>Aparentemente, o servidor tinha algo a informar, mas não se lembra...<br>Para compensar, aqui está a foto de uma bela batata:<br><br><br>";
                echo "<img src='./media/img/batata.png' />";
            }
            ?>
        </div>
    </div>
    <div class="genericBar" style="height: 20px;"></div>
</div>