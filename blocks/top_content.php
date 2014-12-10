<div class="upperBar">
    <div style="margin: auto; display: table; width: 1000px">
        <div style="height: 40px; display: table-cell; vertical-align: middle;">
            <?php
            if(login_check($dbCon)){
                echo "Bem vindo ".$_SESSION["username"].".";
                $logado = true;
            }else{
                echo "Ainda não possui uma conta? Faça seu cadastro <a href='cadastro.php'>aqui</a>.";
                $logado = false;
            }
            ?>
        </div>
        <div style="float: right;">
            <div style="height: 40px; display: table-cell; vertical-align: middle;">
                <?php
                if($logado){
                    echo "<a href='pControle.php'>Minha Conta</a> / <a href='scripts/logout.php'>Sair</a>";
                }else{
                    echo "<a href='login.php'>Entrar</a> / <a href='cadastro.php'>Cadastrar</a>";
                }
                ?>
            </div>
        </div>
        <br>
    </div>
</div>
<div class="topContent">
    <div class="topLeft">
        
    </div>
    <div class="topRight">
        
    </div>
    <a href="index.php">
        <div class="topCenter">
            <div>
            </div>
            <!--
            <div style="float: right; position: relative; top: -70px;">
                <a href="cadastro.php">Cadastrar</a>
                <br>
                <a href="login.php">Login Page</a>
            </div>
            -->
        </div>
    </a>
</div>