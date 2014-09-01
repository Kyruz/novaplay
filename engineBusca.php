<!DOCTYPE html>
<html>
    <head>
        <title>Search engine</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <div style="display: table; margin: auto;">
                <h2>Mecânica de busca</h2>
                <form action="dbScripts/searchCore.php" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>
                                Palavras Chave: 
                            </td>
                            <td>
                                <input type="text" name="wordSet"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Categorias:
                            </td>
                            <td>
                                <input list="category" name="category">
                                <datalist id="category">
                                    <option>Todas</option>
                                    <option>Celulares/Smartphones</option>
                                    <option>Notebooks/Ultrabooks</option>
                                    <option>Consoles e Acessórios</option>
                                    <option>Energia/Alimentação</option>
                                    <option>Tablets e Acessórios</option>
                                    <option>Telas/Monitores/TVs</option>
                                    <option>Datashows/Projetores</option>
                                    <option>Som/Home Theater</option>
                                    <option>Jogos</option>
                                    <option>Peças/Componentes</option>
                                    <option>Redes/LAN/Wireless</option>
                                    <option>Cabos/Extensões</option>
                                    <option>PC/Desktop</option>
                                    <option>Teclados</option>
                                    <option>Mouses</option>
                                    <option>Suprimentos</option>
                                    <option>GPS</option>
                                    <option>Conversores</option>
                                    <option>Adaptadores</option>
                                    <option>Antenas e afins</option>
                                    <option>Telefonia Fixa</option>
                                    <option>Perfumes</option>
                                    <option>Automação Comercial</option>
                                    <option>Armazenamento</option>
                                    <option>Fones/Headphones/Headsets</option>
                                    <option>Impressoras/Multifuncionais</option>
                                    <option>Mini-System's/Rádios/MP3/MP4</option>
                                    <option>Iluminação/Lanternas</option>
                                    <option>Blu-Ray's/DVD Players</option>
                                    <option>Calculadoras e afins</option>
                                    <option>Câmeras/Filmadoras</option>
                                    <option>Artigos Automotivos</option>
                                    <option>Outros</option>
                                </datalist>
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" value="Buscar"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
