
<div id="divContent">
    <div class="titleRibbon">
        <h3>CADASTRO: Crie uma conta e aproveite nossos preços!</h3>
    </div>
    <form action="./dbScripts/secSession/cadNew.php" method="POST" name="cadNewClient" id="cliCadForm" onsubmit="return validarFormCadastro('formWarn')">
        <div class="dadosAcesso">
            <p style="text-indent: 10px;">Dados de Acesso</p>
            <div class="dadosAcessoBot">
                <table>
                    <tr>
                        <td>E-mail:</td>
                        <td>Confirmar E-mail:</td>
                        <td>Senha:</td>
                        <td>Confirmar Senha:</td>
                    </tr>
                    <tr>
                        <td><input type="email" name="email" id="email" onfocus="resetBorder('email')"/></td>
                        <td><input type="email" name="confEmail" id="confEmail" onfocus="resetBorder('confEmail')"/></td>
                        <td><input type="password" name="pass" id="pass" onfocus="resetBorder('pass')"/></td>
                        <td><input type="password" name="confSenha" id="confSenha" onfocus="resetBorder('confSenha')"/></td>
                    </tr>
                </table>
            </div>
        </div>
        <div>
            <div class="formPiece" style="float: left;">
                <div>
                    <p style="text-indent: 10px;">Dados Pessoais</p>
                </div>
                <div class="formPieceIn">
                    <table style="margin: auto; text-align: right;">
                        <tr>
                            <td>Nome Completo:</td>
                            <td><input type="text" name="nome" id="nome" onfocus="resetBorder('nome')"/></td>
                        </tr>
                        <tr>
                            <td>Data de Nascimento:</td>
                            <td><input type="text" name="nasc" id="nasc" onfocus="resetBorder('nasc')"/></td>
                        </tr>
                        <tr>
                            <td>CPF:</td>
                            <td><input type="text" name="cpf" id="cpf" onfocus="resetBorder('cpf')"/></td>
                        </tr>
                        <tr>
                            <td>RG:</td>
                            <td><input type="text" name="rg" id="rg" onfocus="resetBorder('rg')"/></td>
                        </tr>
                        <tr>
                            <td>Telefone Celular:</td>
                            <td><input type="text" name="celular" id="celular" onfocus="resetBorder('celular')"/></td>
                        </tr>
                        <tr>
                            <td>Telefone Residencial:</td>
                            <td><input type="text" name="telFixo" id="telFixo" onfocus="resetBorder('telFixo')"/></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="formPiece" style="float: right;">
                <div>
                    <p style="text-indent: 10px;">Endereço</p>
                </div>
                <div class="formPieceIn">
                    <table style="margin: auto; text-align: right;">
                        <tr>
                            <td>CEP:</td>
                            <td><input type="text" name="cep" id="cep" onfocus="resetBorder('cep')"/></td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td><input type="text" name="estado" id="estado" onfocus="resetBorder('estado')"></td>
                        </tr>
                        <tr>
                            <td>Cidade/Município:</td>
                            <td><input type="text" name="cidade" id="cidade" onfocus="resetBorder('cidade')"></td>
                        </tr>
                        <tr>
                            <td>Bairro:</td>
                            <td><input type="text" name="bairro" id="bairro" onfocus="resetBorder('bairro')"></td>
                        </tr>
                        <tr>
                            <td>Complemento:</td>
                            <td><input type="text" name="complemento" id="complemento" onfocus="resetBorder('complemento')"></td>
                        </tr>
                        <tr>
                            <td>Número:</td>
                            <td><input type="text" name="numResi" id="numResi" onfocus="resetBorder('numResi')"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style=" clear: both; padding: 10px;">
            <div style="float: left;">
                <label for="aceitoTermos" style="font-weight: normal;">
                    <input type="checkbox" value="sim" name="aceitoTermos" id="aceitoTermos"/>Ao clicar em CADASTRAR, declaro que aceito os <a href="#" style="color: blue; text-decoration: underline;">termos de serviço e condições de uso</a>.
                </label>
                <p id="formWarn"></p>
            </div>
            <div style="float: right;">
                <input type="submit" value="CADASTRAR"/>
            </div>
        </div>
    </form>
</div>
<script>
//Calls a masking function for these fields.
jQuery(function($){
    $("#nasc").mask("99-99-9999");
    $("#celular").mask("(99) 9999-9999");
    $("#telFixo").mask("(99) 9999-9999");
    $("#cep").mask("99999-999");
});
</script>