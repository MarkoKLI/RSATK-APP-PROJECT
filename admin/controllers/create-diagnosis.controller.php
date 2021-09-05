<?php 
    if (!isset($_POST["name"]) || !isset($_POST["desc"])) {
        $requestFailed = "Something went wrong. Please try again!";
    } else {
        $name = ConversionService::SecureInput($_POST["name"]);
        $desc = ConversionService::SecureInput($_POST["desc"]);

        DiagnosesAdminService::createDiagnosis($name, $desc);

        $_SESSION["diagnoses"] = DiagnosesAdminService::getAllDiagnoses();
        unset($name); unset($desc);
    }
?>