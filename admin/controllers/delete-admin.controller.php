<?php 
    $adminId = filter_input(INPUT_POST,"adminId",FILTER_VALIDATE_INT);

    UsersAdminService::deleteAdmin($adminId);

    $_SESSION["admins"] = UsersAdminService::getAllAdmins();
?>