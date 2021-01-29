<?php 
    $adminId = filter_input(INPUT_POST,"userId",FILTER_VALIDATE_INT);

    UsersAdminService::deleteUser($adminId);

    $_SESSION["users"] = UsersAdminService::getAllUsers();
?>