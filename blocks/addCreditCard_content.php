<?php
if($stmt = $dbCon->prepare("SELECT email,nome,cpf,rg,celular,telFixo,cep,estado,cidade,bairro,complemento,numResi FROM cliente WHERE id_cliente = ?")){
    $stmt->bind_param('d',$_SESSION["user_id"]);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($email,$nome,$cpf,$rg,$celular,$telFixo,$cep,$estado,$cidade,$bairro,$comp,$numResi);
    $stmt->fetch();
}else{
    $_SESSION["erro"] = "Usuário não encontrado.";
    header("Location: ./erro.php");
}
?>

<div id="divContent" style="min-width: 900px;">
    
    <div class="genericBar" style="height: 20px; margin-bottom: 10px;"></div>
    <form name="cardData" id="cardData" method="POST" action="scripts/addCreditCard.php">
        <div>
            <div class="fieldArea" style="float: left; height: 250px;">
                <div class="FA_label">
                    Adicionar Novo Cartão
                </div>
                <div style="padding: 10px 20px; line-height: 2em; display: table; margin: 55px auto;">
                    <table>
                        <tr>
                            <td>
                                Banco: 
                            </td>
                            <td>
                                <select name="banco" id="banco" form="cardData">
                                    <option value="">Escolher Cartão...</option>
                                    <option value="BB">Banco do Brasil</option>
                                    <option value="CA">Caixa</option>
                                    <option value="VI">Visa</option>
                                    <option value="MA">Master Card</option>
                                    <option value="HI">Hipercard</option>
                                    <option value="IT">Itaú</option>
                                    <option value="DI">Diners</option>
                                    <option value="AM">American Express</option>
                                    <option value="EL">Elo</option>
                                    <option value="AU">Aura</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Número do Cartão: 
                            </td>
                            <td>
                                <input type="text" name="numCartao" id="numCartao" />
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="fieldArea" style="float: right; height: 250px;">
                <div class="FA_label">
                    Confirmação de Segurança
                </div>
                <div style="padding: 10px 20px; line-height: 2em; display: table; margin: auto;">
                    <div>
                        Informe a senha do seu cadastro Novaplay.<br>
                        <input type="password" name="pass" id="pass" />
                    </div>
                    <div>
                        Captcha
                    </div>
                </div>
            </div>
        </div>
        <div class="fieldArea" style="clear: both; width: 100%;">
            <input class="genericBtn" style="display: table; margin: 20px auto;" type="submit" value="Adicionar Cartão" />
        </div>
    </form>
    <div class="genericBar" style="height: 20px;"></div>
</div>
