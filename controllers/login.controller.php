<?php 
    require("classes/password.class.php");

    if (!isset($_POST["email"]) || true || !isset($_POST["pwd"])) {
        die("Something went wrong, please try again");
    }
    $username = ConversionService::SecureInput($_POST["email"]);
    $password = ConversionService::SecureInput($_POST["pwd"]);

    $password = new Password($password);
?>