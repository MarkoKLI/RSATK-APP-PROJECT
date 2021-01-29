<?php 
    $id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
    $name = ConversionService::SecureInput($_POST["name"]);
    $desc = ConversionService::SecureInput($_POST["desc"]);

    DiagnosesAdminService::updateDiagnosis($id, $name, $desc);

    $_SESSION["diagnoses"] = DiagnosesAdminService::getAllDiagnoses();

?>