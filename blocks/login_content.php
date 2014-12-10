
<div id="divContent" style="min-width: 900px;">
    
    <div class="genericBar" style="height: 20px;"></div>
    
    <div>
        <div style="float: left; width: 442px; border: solid 1px #DDDDDD; background-color: #EAF4FF; color: #323232; margin: 10px;">
            <div style="background-color: #B0D4F1; padding: 5px 10px; font-size: 16px; font-weight: bold;">
                Já Possui Cadastro
            </div>
            <div style="display: table; margin: auto; padding: 10px 20px; line-height: 2em; height: 150px">
                <div style="display: table-cell; vertical-align: middle;">
                    <form name="login" method="POST" action="./scripts/processLogin.php">
                        <table>
                            <tr>
                                <td>E-mail: </td>
                                <td><input type="email" id="uEmailLog" name="email"/></td>
                            </tr>
                            <tr>
                                <td>Senha: </td>
                                <td><input type="password" id="pass2" name="pass"/></td>
                            </tr>
                        </table>
                        <input type="checkbox" name="contLogado" id="contLogado" value="1"/>
                        <label for="contLogado">Continuar conectado</label>
                        <br>
                        <div style="display: table; margin: auto;">
                            <input type="submit" value="Entrar" class="genericBtn"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div style="float: right; width: 442px; border: solid 1px #DDDDDD; background-color: #EAF4FF; color: #323232; margin: 10px;">
            <div style="background-color: #B0D4F1; padding: 5px 10px; font-size: 16px; font-weight: bold;">
                Novo Cadastro
            </div>
            <div style="display: table; margin: auto; padding: 10px 20px; line-height: 1.5em; height: 150px; text-align: center;">
                <div style="display: table-cell; vertical-align: middle;">
                    Novo no site?<br>
                    Não possui conta ou cadastro conosco?<br>
                    Faça seu cadastro agora. Simples e rápido.<br><br>
                    <a href="./cadastro.php" class="genericBtn">Criar Nova Conta</a>
                </div>
            </div>
        </div>
    </div>
    <div class="genericBar" style="height: 20px;"></div>
</div>
