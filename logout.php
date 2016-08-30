<?php
session_start();
    if(isset($_COOKIE['roll_no']))
    {
        setcookie('roll_no', $_COOKIE['roll_no'], time() - 1600, '/');
        //session_destroy();
        unset($_SESSION['roll_no']);
        unset($_SESSION['full_name']);
        header('Location: home.php');

    }
    else
    {
        die('You are not logged in.. <br /> Click here to <a href="log_in.php">login</a>');

    }
    session_destroy();

?>
