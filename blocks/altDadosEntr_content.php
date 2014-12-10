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
    
    <div>
        <div class="fieldArea" style="float: left; height: 250px;">
            <div class="FA_label">
                Seus Dados
            </div>
            <div style="padding: 10px 20px; line-height: 2em; display: table; margin: auto;">
                <form>
                    <table>
                        <tr>
                            <td>
                                CEP: 
                            </td>
                            <td>
                                <input name="cep" id="cep" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Estado: 
                            </td>
                            <td>
                                <input name="estado" id="estado"  type="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Cidade: 
                            </td>
                            <td>
                                <input name="cidade" id="cidade" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Bairro: 
                            </td>
                            <td>
                                <input name="bairro" id="bairro" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Num. de Residêcia: 
                            </td>
                            <td>
                                <input name="numResi" id="numResi" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Complemento: 
                            </td>
                            <td>
                                <input name="comp" id="comp" type="text" />
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        
        <div class="fieldArea" style="float: right; height: 250px;">
            <div class="FA_label">
                Confirmação de Segurança
            </div>
            <div style="padding: 10px 20px; line-height: 2em; display: table; margin: auto;">
                <div>
                    Informe sua senha.<br>
                    <input type="password" name="pass" id="pass" />
                </div>
                <div>
                    Captcha
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="fieldArea" style="clear: both; width: 100%;">
        <a href="#" class="genericBtn" style="display: table; margin: 20px auto;">Confirmar Alteração</a>
    </div>
        
    <div class="genericBar" style="height: 20px;"></div>
</div>
