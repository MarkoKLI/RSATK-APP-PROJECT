<?php 
    require("classes/password.class.php");
    require("./models/users.service.php");

    if (!isset($_POST["email"]) || !isset($_POST["pwd"])) {
        die("Something went wrong, please try again");
    }

    $email = ConversionService::SecureInput($_POST["email"]);
    $password = ConversionService::SecureInput($_POST["pwd"]);
    $userDetails = UsersService::getUserDetailsByEmail($email);

    $validLogin = Password::validatePassword($userDetails["passwordHash"], $userDetails["passwordSalt"], $password);

?>