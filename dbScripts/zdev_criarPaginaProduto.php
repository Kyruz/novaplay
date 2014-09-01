<?php
    $myFile = "fileName.html";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = "<whatever you want inside the html file>";
    fwrite($fh, $stringData);