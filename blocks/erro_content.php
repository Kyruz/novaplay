
<div id="divContent" style="min-width: 900px;">
    <div class="genericBar" style="height: 20px;"></div>
    <div style="display: table; margin: auto;">
        <div style="height: 400px; display: table-cell; vertical-align: middle; text-align: center;">
            <?php
            if(isset($_SESSION["erro"])){
                echo "Ocorreu um erro durante a operação realizada:<br><br>";
                echo $_SESSION["erro"]."<br><br>";
                echo "Em caso de dúvidas, dificuldades com o uso da loja online ou<br>".
                        "para reportar erros ou bugs no sistema, ".
                        "<a href='supContato.php' style='color: blue; text-decoration: underline;'>envie-nos um email por aqui.</a><br>";
                unset($_SESSION["erro"]);
            }else{
                echo "Aparentemente ocorreu um erro, mas o sistema não foi capaz de identifica-lo.<br>".
                        "Em caso de dúvidas, dificuldades com o uso da loja online ou<br>".
                        "para reportar erros e bugs no sistema, ".
                        "<a href='supContato.php' style='color: blue; text-decoration: underline;'>envie-nos um email por aqui.</a><br>";
            }
            ?>
        </div>
    </div>
    <div class="genericBar" style="height: 20px;"></div>
</div>