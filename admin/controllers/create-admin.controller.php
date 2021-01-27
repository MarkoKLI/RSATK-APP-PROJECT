<?php 
    require_once("./models/users-admin.service.php");
    require_once("../controllers/classes/password.class.php");

    $username = ConversionService::SecureInput($_POST["username"]);
    $password = ConversionService::SecureInput($_POST["pwd"]);

    $password = new Password($password);
    $passwordSalt = $password->getPasswordSalt();
    $passwordHash = $password->getPassword();

    UsersAdminService::createAdmin($username, $passwordHash, $passwordSalt);
?>