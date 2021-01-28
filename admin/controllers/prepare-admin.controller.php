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
    // note to self:
    // Dodadi i za departments i za diagnoses da si gi ima vo sesija
    // za vo dropdowns (prvo osposobi gi formularite, pa spremi seed-ovi za vo tabela,
    // pa posle ova dovrsi go)
?>