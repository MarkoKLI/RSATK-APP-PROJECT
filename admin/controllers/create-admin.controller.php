<?php 
    $username = ConversionService::SecureInput($_POST["username"]);
    $password = ConversionService::SecureInput($_POST["pwd"]);
    $confirmPassword = ConversionService::SecureInput($_POST["pwd-conf"]);

    unset($requestFailed);
    unset($passwordConfirmFailed);
    unset($usernameTaken);

    if ( !isset($_POST["username"]) || !isset($_POST["pwd"]) || !isset($_POST["pwd-conf"]) ) {
        $adminRequestFailed = "Something went wrong. Please try again!"; 
    } else {
        $username = ConversionService::SecureInput($_POST["username"]);
        $password = ConversionService::SecureInput($_POST["pwd"]);
        $confirmPassword = ConversionService::SecureInput($_POST["pwd-conf"]);

        if (UsersAdminService::checkUsernameExists($username)) {
            $usernameTaken = "That username is taken (see below). Please try again!";
        } else if ($password !== $confirmPassword) {
            $passwordConfirmFailed = "Passwords do not match. Please try again!";
        } else {
            $password = new Password($password);
            $passwordSalt = $password->getPasswordSalt();
            $passwordHash = $password->getPassword();

            UsersAdminService::createAdmin($username, $passwordHash, $passwordSalt);

            // Refresh admin list
            $_SESSION["admins"] = UsersAdminService::getAllAdmins();

            header("Location: " . $location . "?action=show_users");
        }
    }

?>