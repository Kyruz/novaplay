
<div id="divContent">
    <div class="titleRibbon">
        <h3>CADASTRO: Crie uma conta e aproveite nossos preços!</h3>
    </div>
    <form action="./scripts/cadNewClient.php" method="POST" name="cadNewClient" id="cadNewClient" onsubmit="return validarFormCadastro('formWarn')">
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
                        <td><input type="text" name="email" id="email" onfocus="resetBorder('email')"
                            <?php 
                            if(isset($_SESSION["formEmail"])){echo " value='".$_SESSION["formEmail"]."' ";
                            }?>/>
                        </td>
                        <td><input type="email" name="confEmail" id="confEmail" onfocus="resetBorder('confEmail')"
                            <?php 
                            if(isset($_SESSION["formEmail"])){echo " value='".$_SESSION["formEmail"]."' ";
                            }?>/>
                        </td>
                        <td><input type="password" name="pass" id="pass" onfocus="resetBorder('pass')"/>
                        </td>
                        <td><input type="password" name="confPass" id="confPass" onfocus="resetBorder('confPass')"/></td>
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
                            <td>
                                <input type="text" name="nome" id="nome" onfocus="resetBorder('nome')"
                                <?php
                                if(isset($_SESSION["nome"])){echo " value='".$_SESSION["nome"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Data de Nascimento:</td>
                            <td>
                                <input type="text" name="nascD" maxlength="2" id="nascD" onfocus="resetBorder('nascD')" style="width: 30px;" 
                                <?php
                                if(isset($_SESSION["nascD"])){echo " value='".$_SESSION["nascD"]."' ";}
                                ?>/> / 
                                <input type="text" name="nascM" maxlength="2" id="nascM" onfocus="resetBorder('nascM')" style="width: 30px;"
                                <?php
                                if(isset($_SESSION["nascM"])){echo " value='".$_SESSION["nascM"]."' ";}
                                ?>/>/ 
                                <input type="text" name="nascA" maxlength="4" id="nascA" onfocus="resetBorder('nascA')" style="width: 60px;"
                                <?php
                                if(isset($_SESSION["nascA"])){echo " value='".$_SESSION["nascA"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>CPF:</td>
                            <td>
                                <input type="text" name="cpf" id="cpf" maxlength="11" onfocus="resetBorder('cpf')"
                                <?php
                                if(isset($_SESSION["cpf"])){echo " value='".$_SESSION["cpf"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>RG:</td>
                            <td>
                                <input type="text" name="rg" maxlength="20" id="rg" onfocus="resetBorder('rg')"
                                <?php
                                if(isset($_SESSION["rg"])){echo " value='".$_SESSION["rg"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefone Celular:</td>
                            <td>
                                <input type="text" name="celular" id="celular" maxlength="15" onfocus="resetBorder('celular')"
                                <?php
                                if(isset($_SESSION["celular"])){echo " value='".$_SESSION["celular"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefone Residencial:</td>
                            <td>
                                <input type="text" name="telFixo" id="telFixo" maxlength="15" onfocus="resetBorder('telFixo')"
                                <?php
                                if(isset($_SESSION["telFixo"])){echo " value='".$_SESSION["telFixo"]."' ";}
                                ?>/>
                            </td>
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
                            <td>
                                <input type="text" name="cep" id="cep" maxlength="9" onfocus="resetBorder('cep')"
                                <?php
                                if(isset($_SESSION["cep"])){echo " value='".$_SESSION["cep"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td>
                                <select name="estado" id="estado" form="cadNewClient">
                                    <option value="">Escolher estado...</option>
                                    <option value="Acre">Acre</option>
                                    <option value="Alagoas">Alagoas</option>
                                    <option value="Amapá">Amapá</option>
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Bahia">Bahia</option>
                                    <option value="Ceará">Ceará</option>
                                    <option value="Distrito Federal">Distrito Federal</option>
                                    <option value="Espírito Santo">Espírito Santo</option>
                                    <option value="Goiás">Goiás</option>
                                    <option value="Maranhão">Maranhão</option>
                                    <option value="Mato Grosso">Mato Grosso</option>
                                    <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                    <option value="Minas Gerais">Minas Gerais</option>
                                    <option value="Pará">Pará</option>
                                    <option value="Paraíba">Paraíba</option>
                                    <option value="Paraná">Paraná</option>
                                    <option value="Pernambuco">Pernambuco</option>
                                    <option value="Piauí">Piauí</option>
                                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                                    <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                    <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                    <option value="Rondônia">Rondônia</option>
                                    <option value="Roraima">Roraima</option>
                                    <option value="Santa Catarina">Santa Catarina</option>
                                    <option value="São Paulo">São Paulo</option>
                                    <option value="Sergipe">Sergipe</option>
                                    <option value="Tocantins">Tocantins</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cidade/Município:</td>
                            <td>
                                <input type="text" name="cidade" id="cidade" onfocus="resetBorder('cidade')"
                                <?php
                                if(isset($_SESSION["cidade"])){echo " value='".$_SESSION["cidade"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Bairro:</td>
                            <td>
                                <input type="text" name="bairro" id="bairro" onfocus="resetBorder('bairro')"
                                <?php
                                if(isset($_SESSION["bairro"])){echo " value='".$_SESSION["bairro"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Complemento:</td>
                            <td>
                                <input type="text" name="complemento" id="complemento" onfocus="resetBorder('complemento')"
                                <?php
                                if(isset($_SESSION["complemento"])){echo " value='".$_SESSION["complemento"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                        <tr>
                            <td>Número:</td>
                            <td>
                                <input type="text" name="numResi" id="numResi" onfocus="resetBorder('numResi')"
                                <?php
                                if(isset($_SESSION["numResi"])){echo " value='".$_SESSION["numResi"]."' ";}
                                ?>/>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style=" clear: both; padding: 10px;">
            <div style="float: left;">
                <label for="aceitoTermos" style="font-weight: normal;">
                    <input type="checkbox" value="y" name="accepted" id="accepted"
                    <?php
                    if(isset($_SESSION["accepted"]) && $_SESSION["accepted"] == true){echo " checked='true' ";}
                    ?>/>
                        Ao clicar em CADASTRAR, declaro que aceito os <a href="#" style="color: blue; text-decoration: underline;">termos de serviço e condições de uso</a>.
                </label>
                <p id="formWarn"></p>
            </div>
            <div style="float: right;">
                <input type="submit" value="CADASTRAR"/>
            </div>
        </div>
    </form>
    <?php
    if(isset($_GET["errMsg"])){
        echo "<br><br><div>".$_GET["errMsg"]."</div>";
    }
    ?>
</div>
<script>
//Calls a masking function for these fields.
jQuery(function($){
    $("#celular").mask("(99) 9999-9999");
    $("#telFixo").mask("(99) 9999-9999");
    $("#cep").mask("99999-999");
});
</script>