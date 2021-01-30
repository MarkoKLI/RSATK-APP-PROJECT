<?php 
    $requestFailed = false;
    $invalidCredentials = false;

    if (!isset($_POST["email"]) || !isset($_POST["pwd"])) {
        $loginError = "Something went wrong. Please try again!";
        $requestFailed = true;
    } else {
        $email = ConversionService::SecureInput($_POST["email"]);
        $password = ConversionService::SecureInput($_POST["pwd"]);
        $userDetails = UsersService::getUserDetailsByEmail($email);

        $validLogin = Password::validatePassword($userDetails["passwordHash"], $userDetails["passwordSalt"], $password);

        if ($validLogin) {
            $userType = ($userDetails['isDoctor']) ? "DOCTOR" : "PATIENT";
            $expiration = time() + 86400;
            setcookie("userType", $userType, $expiration);
            setcookie("userId", $userDetails["id"], $expiration);
            header("Location: " . $location);
        } else {
            $loginError = "Wrong username or password. Please try again!";
            $invalidCredentials = true;
        }
    }
?>