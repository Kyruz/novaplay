<?php
include_once "./dbCon.php";
include_once "./funLib.php";

sec_session_start();

if (isset($_POST['email'], $_POST['pass'])) {
    $email = $_POST['email']; // The email, used as username for login here
    $pass = $_POST['pass']; // Raw password
 
    if (login($email, $pass, $dbCon) == true) {
        // Login success 
        //header('Location: protectedPage.php');
        echo "Login success!";
    } else {
        // Login failed 
        header('Location: main.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
}
