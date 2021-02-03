<?php
    unset($userRequestFailed);
    unset($userExists);
    if (!isset($_POST["name"]) || !isset($_POST["surname"]) || !isset($_POST["embr"]) ||
        !isset($_POST["email"]) || !isset($_POST["phoneNr"]) || !isset($_POST["address"]) ||
        !isset($_POST["dob"])) {
        $userRequestFailed = "Something went wrong. Please try again!";
    } else {
        $name = ConversionService::SecureInput($_POST["name"]);
        $surname = ConversionService::SecureInput($_POST['surname']);
        $embr = ConversionService::SecureInput($_POST['embr']);
        $email = ConversionService::SecureInput(filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL));
        $phoneNr = ConversionService::SecureInput($_POST['phoneNr']);
        $address = ConversionService::SecureInput($_POST['address']);
        $dob = ConversionService::SecureInput($_POST['dob']);
        $isDoctor = (bool)ConversionService::SecureInput($_POST['isDoctor']);
        $specialtyId = (int)ConversionService::SecureInput($_POST['specialty']);

        if (UsersAdminService::checkUserExists($embr)) {
            $userExists = "User with that EMBR already exists";
        } else {
            $specialtyId = ($specialtyId == 0)? null : $specialtyId;
            $password = new Password($embr);
            $passwordS = $password->getPasswordSalt();
            $passwordH = $password->getPassword();
        
            $success = UsersAdminService::createUser($name, $surname, $embr, $email, $phoneNr,
                                                    $dob, $specialtyId, $address, $isDoctor,
                                                    $passwordS, $passwordH);

            // Refresh user list
            $_SESSION["users"] = UsersAdminService::getAllUsers();
        
            header("Location: " . $location . "?action=show_users");
        }
    }

        $backendErrors = (isset($userRequestFailed) ||
                          isset($specialtyRequired) ||
                          isset($userExists));

?>