<?php 
    if (!isset($_POST["title"]) || !isset($_POST["desc"])) {
        $requestFailed = "Something went wrong. Please try again!";
    } else {
        $title = ConversionService::SecureInput($_POST["title"]);
        $desc = ConversionService::SecureInput($_POST["desc"]);

        DepartmentsAdminService::createDepartment($title, $desc);

        $_SESSION["specialties"] = DepartmentsAdminService::getAllDepartments();
        unset($title); unset($desc);
    }
?>