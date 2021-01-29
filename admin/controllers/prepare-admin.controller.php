<?php 
    require_once("./models/db.service.php");
    require_once("./models/users-admin.service.php");
    require_once("./models/diagnoses-admin.service.php");
    require_once("./models/departments-admin.service.php");
    require_once("../controllers/classes/password.class.php");

    if(!isset($_SESSION["admins"])) {
        $_SESSION["admins"] = UsersAdminService::getAllAdmins();
    }
    if(!isset($_SESSION["users"])) {
        $_SESSION["users"] = UsersAdminService::getAllUsers();
    }
    if(!isset($_SESSION["specialties"])) {
        $_SESSION["specialties"] = DepartmentsAdminService::getAllDepartments();
    }
    if(!isset($_SESSION["diagnoses"])) {
        $_SESSION["diagnoses"] = DiagnosesAdminService::getAllDiagnoses();
    }