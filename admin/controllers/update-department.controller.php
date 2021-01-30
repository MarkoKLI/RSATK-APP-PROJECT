<?php 
    if (!isset($_POST["title"]) || !isset($_POST["desc"]) || !isset($_POST["id"])) {
        $requestFailed = "Something went wrong. Please try again!";
    } else {
        $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
        $name = ConversionService::SecureInput($_POST["title"]);
        $desc = ConversionService::SecureInput($_POST["desc"]);
        
        DepartmentsAdminService::updateDepartment($id, $title, $desc);
        
        $_SESSION["specialties"] = DepartmentsAdminService::getAllDepartments();
    }

?>