<?php
    require_once("./models/users-admin.service.php");

    $name = ConversionService::SecureInput($_POST["name"]);
    $surname = ConversionService::SecureInput($_POST['surname']);
    $embr = ConversionService::SecureInput($_POST['embr']);
    $email = ConversionService::SecureInput(filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL));
    $phoneNr = ConversionService::SecureInput($_POST['phoneNr']);
    $address = ConversionService::SecureInput($_POST['address']);
    $dob = ConversionService::SecureInput($_POST['dob']);
    $isDoctor = (bool)ConversionService::SecureInput($_POST['isDoctor']);
    $specialtyId = (int)ConversionService::SecureInput($_POST['specialty']);

    $specialtyId = ($specialtyId == 0)? null : $specialtyId;

    $success = UsersAdminService::createUser($name, $surname, $embr, $email, $phoneNr,
                                    $dob, $specialtyId, $address, $isDoctor);

    header("Location: " . $location . "?action=show_users");
?>