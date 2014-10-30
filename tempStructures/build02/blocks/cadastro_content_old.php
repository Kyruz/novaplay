<!-- <input type="text" class="genericInput" name="" id=""> -->
<div id="divContent">
    <form action="./dbScripts/cadastrarCliente.php" method="POST" name="cliCadForm" id="cliCadForm">
        <h3 style="margin-top: 7px;">CADASTRO: Seja bem vindo à nossa página de cadastro!</h3>
        <div class="greyBar" style="height: 5px;"></div>
        <p>Dados para Acesso</p>
        <div class="greyBar" style="height: 3px;"></div>
        <div id="dadosAcesso">
            <div style="display: table; margin: auto;">
                <table>
                    <tr>
                        <td>E-mail:</td>
                        <td>Confirmar E-mail:</td>
                        <td>Senha:</td>
                        <td>Confirmar Senha:</td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" id="email"></td>
                        <td><input type="email" name="confEmail" id="confEmail"></td>
                        <td><input type="password" name="senha" id="senha"></td>
                        <td><input type="password" name="confSenha" id="confSenha"></td>
                    </tr>
                </table>
            </div>
        </div>
        
        <div>
            <div class="formPiece" style="float: left; border-right: 0px;">
                <div class="greyBar" style="height: 3px;"></div>
                Dados Pessoais
                <div class="greyBar" style="height: 1px;"></div>
                <table style="margin: 0px; text-align: right;">
                    <tr>
                        <td>Nome Completo:</td>
                        <td><input type="text" name="nome" id="nome"></td>
                    </tr>
                    <tr>
                        <td>Data de Nascimento:</td>
                        <td><input type="text" name="nasc" id="nasc"></td>
                    </tr>
                    <tr>
                        <td>CPF:</td>
                        <td><input type="text" name="cpf" id="cpf"></td>
                    </tr>
                    <tr>
                        <td>RG:</td>
                        <td><input type="text" name="rg" id="rg"></td>
                    </tr>
                    <tr>
                        <td>Telefone Celular:</td>
                        <td><input type="text" name="celular" id="celular"></td>
                    </tr>
                    <tr>
                        <td>Telefone Residencial:</td>
                        <td><input type="text" name="telFixo" id="telFixo"></td>
                    </tr>
                </table>
            </div>
            <div class="formPiece" style="float: right;">
                <div class="greyBar" style="height: 3px;"></div>
                Endereço
                <div class="greyBar" style="height: 1px;"></div>
                <table style="margin: 0px; text-align: right;">
                    <tr>
                        <td>CEP:</td>
                        <td><input type="text" name="cep" id="cep"></td>
                    </tr>
                    <tr>
                        <td>Estado:</td>
                        <td><input type="text" name="estado" id="estado"></td>
                    </tr>
                    <tr>
                        <td>Cidade/Município:</td>
                        <td><input type="text" name="cidade" id="cidade"></td>
                    </tr>
                    <tr>
                        <td>Bairro:</td>
                        <td><input type="text" name="bairro" id="bairro"></td>
                    </tr>
                    <tr>
                        <td>Complemento:</td>
                        <td><input type="text" name="complemento" id="complemento"></td>
                    </tr>
                    <tr>
                        <td>Número:</td>
                        <td><input type="text" name="numRes" id="numRes"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div style="clear: both;"></div>
            <div style="float: right; padding: 10px;">
                <button name="submit" id="submit" onclick="checkForm('cliCadForm')">CADASTRAR</button>
            </div>
    </form>
    <br><br>
    <div class="greyBar" style="height: 5px;"></div>
</div>
    <!--
    <div style="display: table; margin: auto; text-align: right;">
            <div style="float: left;">
                <form action="./dbScripts/cadastrarCliente.php" method="POST" name="formCadastro" id="formCadastro">
                    Nome:                  <input type="text" name="nome" id="nome" class="genericInput"/><br>
                    Login:                 <input type="text" name="login" id="login" class="genericInput"/><br>
                    Senha:                 <input type="text" name="senha" id="senha" class="genericInput"/><br>
                    Repetir Senha:         <input type="text" name="senhaRep" id="senhaRep" class="genericInput"/><br>
                    E-mail:                <input type="text" name="email" id="email" class="genericInput"/><br>
                    Telefone/Celular:      <input type="text" name="tel1" id="tel1" class="genericInput"/><br>
                    Telefone/Celular2:     <input type="text" name="tel2" id="tel2" class="genericInput"/><br>
                    RG/CPF:                <input type="text" name="rg_cpf" id="rg_cpf" class="genericInput"/><br>
                    Data de Nascimento:    <input type="text" name="nasc" id="nasc" class="genericInput"/><br>
                    CEP:                   <input type="text" name="cep" id="cep" class="genericInput"/><br>
                    Estado:                <input type="text" name="estado" id="estado" class="genericInput"/><br>
                    Cidade/Município:      <input type="text" name="cidade" id="cidade" class="genericInput"/><br>
                    Bairro:                <input type="text" name="bairro" id="bairro" class="genericInput"/><br>
                    Complemento:           <input type="text" name="lograd" id="lograd" class="genericInput"/><br>
                    Número da Casa/Apart.: <input type="text" name="numRes" id="numRes" class="genericInput"/><br>
                </form>
                <button name="submit" id="submit" class="generalButton" onclick="checkForm('formCadastro')">Cadastrar</button>
            </div>
    </div>
    -->
