<?php
session_start();

function checkLogin() {
    if (!isset($_SESSION["user_id"])) {
        header("Location: user/login.php");
        exit();
    }
}
?>
