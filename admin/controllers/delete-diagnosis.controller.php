<?php 
    
    $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);

    DiagnosesAdminService::deleteDiagnosis($id);

    $_SESSION["diagnoses"] = DiagnosesAdminService::getAllDiagnoses();

?>