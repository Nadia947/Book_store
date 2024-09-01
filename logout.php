<?php
session_start();
    if(isset($_SESSION['auth'])) {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['message'] = "Te-ai delogat!";
    }
    session_destroy();
    header('Location: login.php');
?>