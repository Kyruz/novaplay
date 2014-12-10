<?php
    include_once 'scripts/funLib.php';
    include_once 'scripts/dbCon.php';
    sec_session_start();
    if(isset($_SESSION["urlAtual"])){
        $_SESSION["urlAnt"] = $_SESSION["urlAtual"];
    }else{
        if(isset($_SESSION["urlAnt"])){
            unset($_SESSION["urlAnt"]);
        }
    }
    $_SESSION["urlAtual"] = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<!-------------------------------------------------
|Desenvolvido por Lucas Carvalho Flores           |
|Contato: (49) 9818 1022 eclipsekyruz@gmail.com   |
--------------------------------------------------
|Developed by Lucas Carvalho Flores               |
|Contact: +55 49 9818 1022 eclipsekyruz@gmail.com |
-------------------------------------------------->
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Novaplay</title>
        <link rel="shortcut icon" href="media/img/favicon.png" />
        <!-- CSS principal do site -->
        <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
        <!-- JavaScript personal Function Library -->
        <script src="generalScripts/funLib.js"></script>
        <!-- JavaScript que amplia as fotos na pagina de cada produto -->
        <script src="js-global/FancyZoom.js"></script>
        <script src="js-global/FancyZoomHTML.js"></script>
        <!-- CSS e JavaScript para os slides da pagina inicial(home)-->
        <link href="themes/H/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="themes/H/js-image-slider.js"></script>
        <!-- CSS e JavaScript para os slides das outras partes do site -->
        <link href="themes/1/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="themes/1/js-image-slider.js"></script>
        <!-- jQuery UI scripts -->
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(function() {
                $( "#accordion" ).accordion({
                  event: "click hoverintent"
                });
            });
        </script>
        <script src="./generalScripts/jQueryInputMask.js"></script>
    </head>
    <body onresize="resizeTop()" onload="setupZoom()">
        <div class="pagina">