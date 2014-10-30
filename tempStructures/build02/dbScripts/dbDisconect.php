<?php
    //Retorna true para desconexão bem sucedida e false caso contrário.
    function dbDisconect($db_con){
        $con = mysqli_close($db_con);
        return $con;
    }