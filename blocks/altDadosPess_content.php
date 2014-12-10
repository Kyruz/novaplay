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
            <div style="padding: 10px 20px; line-height: 2em;">
                <form>
                    <table>
                        <tr>
                            <td>
                                Nome: 
                            </td>
                            <td>
                                <input name="nome" id="nome" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 Email: 
                            </td>
                            <td>
                                <input name="email" id="email"  type="email" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                CPF: 
                            </td>
                            <td>
                                <input name="cpf" id="cpf" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                RG: 
                            </td>
                            <td>
                                <input name="rg" id="rg" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Celular: 
                            </td>
                            <td>
                                <input name="telCell" id="tecCell" type="text" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Fixo: 
                            </td>
                            <td>
                                <input name="telFixo" id="telFixo" type="text" />
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
            <div style="padding: 10px 20px; line-height: 2em;">
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
