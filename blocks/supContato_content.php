
<div id="divContent" style="min-width: 900px;">
    <div class="genericBar" style="height: 20px;"></div>
    <div style="display: table; margin: auto;">
        <div style="height: 400px; display: table-cell; vertical-align: middle; text-align: center;">
            <form action="scripts/sendSupEmail.php" method="POST" name="supEmail" id="supEmail">
                <table>
                    <tr>
                        <td>Seu Nome: </td>
                        <td><input type="text" size="50" name="nome"/></td>
                    </tr>
                    <tr>
                        <td>Seu Email: </td>
                        <td><input type="email" size="50" name="email"/></td>
                    </tr>
                    <tr>
                        <td>Assunto: </td>
                        <td><input type="text" size="50" name="assunto"/></td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top;">Mensagem: </td>
                        <td>
                            <textarea name="mensagem" rows="10" cols="52"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="Enviar"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="genericBar" style="height: 20px;"></div>
</div>