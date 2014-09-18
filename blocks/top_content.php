<!--
Lembrar de que clicar em cima dos botões do menu principal direcionará para uma pagina com todas as subcategorias
da categoria principal a que o botão se refere, enquanto clicar num dos sublinks direcionará para uma pagina só daquela
subcategoria. Isso dará maior precisão e controle à navegação do usuário.
-->
<div class="topContent">
    <div id="topMain" style="background-color: #DDDDDD; margin: 0px; padding: 0px; height: 250px;">
        <div id="topBackgroundL" style="width: 16%; float: left; background-image: url(media/img/bgTopLeft.png); background-repeat: repeat-x; height: 250px;">
            
        </div>
        <div id="topMainCenter" style="width: 896px; background-image: url(media/img/bgTopCenter.png); float: left; height: 250px;">
            <div style="float: left; width: 500px; height: 240px;">
                <div style="height: 190px;"></div>
                <div>
                    <a href="cadastroProd.php" style="color: black;">AdmTemp</a>
                    <a href="engineBusca.php" style="color: black;">Engine de busca</a>
                    <a href="experimentos.php" style="color: black">Exp.</a>
                </div>
            </div>
            <div style="height: 240px; float: right;">
                <div style="margin-top: 3px; height: 50px; width: 289px; background-image: url(media/img/topPiece.png); background-repeat: no-repeat; padding-top: 13px; padding-left: 23px;">
                    <span style="margin: 5px;"><a href="#" style="color: white;">Login / Cadastrar</a></span>
                    <span style="margin: 5px;"><a href="#" style="color: white;">Carrinho</a></span>
                    <span style="margin: 5px;"><a href="#" style="color: white;">Contato</a></span>
                </div>
                <div style="position: relative; top: 80px;">
                    <form method="POST" action="dbScripts/quickSearch.php" enctype="multipart/form-data">
                        <input type="submit" value="Buscar"/>
                        <input type="text" name="wordSet"/>
                    </form>
                </div>
            </div>
        </div>
        <div id="topBackgroundR" style="background-image: url(media/img/bgTopRight.png); background-repeat: repeat-x; height: 250px;">
            
        </div>
    </div>
    <div class="mainMenuDiv">
        <div class="mainMenuStruct">
            <ul class="mainMenu">
                <li><a href="#"><img src="media/img/btnTodosItensOff.png"></a>
                    <ul class="ulSubmenuTod">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/todasCat.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnNotebooksOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/informatica.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnCelularesOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/celulares.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="jogosConsoles.php?unsetPA=1"><img src="media/img/btnJogosConsolesOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/jogosConsoles.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnTabletsOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/tablets.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnAutomotivoOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/automotivo.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnEletronicosOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/eletronicos.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnAcessoriosOff.png"></a>
                    <ul class="ulSubmenu">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/acessorios.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnArmazenamentoOff.png"></a>
                    <ul class="ulSubmenuArm">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/armazenamento.php';
                            ?>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><img src="media/img/btnPerfumesOff.png"></a>
                    <ul class="ulSubmenuPer">
                        <li class="liSubmenu">
                            <?php
                                include 'blocks/mainMenu/perfumes.php';
                            ?>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
