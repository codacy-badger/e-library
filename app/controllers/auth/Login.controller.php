<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if ($_SESSION['user_type'] === 'Reader') {
        header("location: /user");
        exit;
    } elseif ($_SESSION['user_type'] === 'Admin') {
        header("location: /admin");
    }
}
require 'app/views/auth/Login.view.php';
if (isset($_POST['login'])) {
    App::get('databaseUser')->verifyUser($_POST['email']);
} else {
    return 'please try again later';
}
