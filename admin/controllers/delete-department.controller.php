<?php 
    
    $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);

    DepartmentsAdminService::deleteDepartment($id);

    $_SESSION["specialties"] = DepartmentsAdminService::getAllDepartments();

?>