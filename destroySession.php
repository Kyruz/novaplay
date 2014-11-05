<?php
include_once "./dbScripts/secSession/dbCon.php";
include_once "./dbScripts/secSession/funLib.php";

sec_session_start();

session_destroy();

echo "<h3>Session destroyed</h3>";
echo "<a href='./index.php'>Go back</a>";
