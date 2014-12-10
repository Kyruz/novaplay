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
<div>
    <div id="divContent" style="min-width: 900px;">
        <div class="labeledBar">
            Bem vindo ao seu Painel de Controle, <?php echo $_SESSION["username"]; ?>
        </div>
        <div>
            <div class="fieldArea" style="float: left;">
                <div class="FA_label">
                    Dados Pessoais
                </div>
                <div style="padding: 10px 20px; line-height: 2em;">
                    <?php
                    echo "<b>Nome:</b> $nome<br>";
                    echo "<b>Email:</b> $email<br>";
                    echo "<b>CPF:</b> $cpf<br>";
                    echo "<b>RG:</b> $rg<br>";
                    echo "<b>Celular:</b> $celular<br>";
                    echo "<b>Tel. Fixo:</b> $telFixo<br>";
                    ?>
                    <a href="altDadosPess.php" class="genericBtn" style="float: right; position: relative; top: -15px;">Alterar</a>
                </div>
            </div>
            <div class="fieldArea" style="float: right;">
                <div class="FA_label">
                    Dados de Entrega
                </div>
                <div style="padding: 10px 20px; line-height: 2em;">
                    <?php
                    echo "<b>CEP:</b> $cep<br>";
                    echo "<b>Estado:</b> $estado<br>";
                    echo "<b>Cidade:</b> $cidade<br>";
                    echo "<b>Bairro:</b> $bairro<br>";
                    echo "<b>Num. de Residêcia:</b> $numResi<br>";
                    echo "<b>Complemento:</b> $comp<br>";
                    ?>
                    <a href="altDadosEntr.php"  class="genericBtn"  style="float: right; position: relative; top: -15px;">Alterar</a>
                </div>
            </div>
        </div>
        <div class="labeledBar" style="clear: both;">
            Dados de Conta
        </div>
        <div class="fieldArea" style="float: left; height: 200px;">
            <div class="FA_label">
                Dados de Acesso
            </div>
            <div style="padding: 10px 20px; line-height: 2em;">
                <?php echo "<b>Email:</b> $email"; ?>
                <a href="#" class="genericBtn" style="float: right;">Alterar</a>
                <a href="#" class="genericBtn" style="float: right; position: relative; top: 90px;">Trocar Senha</a>
            </div>
        </div>
        <div class="fieldArea" style="float: right; height: 200px;">
            <div class="FA_label">
                Dados de Pagamentos
            </div>
            <div style="padding: 10px 20px; line-height: 2em;">
                <b>Cartões de Crédito registrados:</b><br>
                <?php
                if($stmt = $dbCon->prepare("SELECT id_cartao, numero, banco FROM cartao WHERE id_cliente = ?")){
                    $stmt->bind_param('d',$_SESSION["user_id"]);
                    $stmt->execute();
                    $stmt->bind_result($id_cartao, $numCartao, $banco);
                    /*
                    $stmt->store_result();
                    $stmt->bind_result($id_cartao, $numCartao, $banco);
                    $stmt->fetch();
                    */
                    echo "<table>";
                    while($stmt->fetch()){
                        echo "<tr><td>".$banco."</td><td>".$numCartao."</td></tr>";
                    }
                    echo "</table>";
                }else{
                    
                }
                ?>
                <!--
                <table>
                    <tr>
                        <td>
                            Nome_do_Cartão 67*****6
                        </td>
                        <td>
                            <a href="#" class="genericBtn2">Remover</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nome_do_cartão 45*****3
                        </td>
                        <td>
                            <a href="#" class="genericBtn2">Remover</a>
                        </td>
                    </tr>
                </table>
                -->
                <br>
                <a href="addCreditCard.php" class="genericBtn" style="float: right;">Adicionar</a>
            </div>
        </div>
    </div>
</div>