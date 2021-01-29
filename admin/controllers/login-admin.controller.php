<?php
    $requestFailed = false;
    $invalidCredentials = false;

    if (!isset($_POST["username"]) || !isset($_POST["pwd"])) {
        $loginError = "Something went wrong. Please try again!";
        $requestFailed = true;
    } else {
        $username = ConversionService::SecureInput($_POST["username"]);
        $password = ConversionService::SecureInput($_POST["pwd"]);
        $adminDetails =  UsersAdminService::getAdminPasswordDetailsByUsername($username);

        $validLogin = Password::validatePassword($adminDetails["passwordHash"], $adminDetails["passwordSalt"], $password);

        if ($validLogin) {
            $expiration = time() + 86400;
            setcookie("adminId", $adminDetails["id"], $expiration);
            header("Location: " . $location);
        } else {
            $loginError = "Wrong username or password. Please try again!";
            $invalidCredentials = true;
        }
    }
?>