<?php 
    session_start();
    // UNCOMMENT WHEN EVERYONE INSTALLS SSL CERT
    // require_once("./controllers/secure-connection.controller.php");
?>

<!DOCTYPE html>
<html lang="mk">
<head>
    <!-- Bootstrap CSS CDN source -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JQuery, Popper and Bootstrap CSS CDN source -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- JQuery cookie module CDN source -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <!-- Font Awesome CSS CDN source-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>As yet unnamed | Admin</title>
</head>

<body>
    <div class="container-fluid">
        <div class="navbar navbar-light">
            <h2 class="m-3">РСАТК Проект - Администрација</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
    <?php
        require_once("./controllers/services/conversion.service.php");
        
        $adminId = filter_input(INPUT_COOKIE,"adminId",FILTER_VALIDATE_INT);
        if ($adminId) {
            if (isset($_POST["action"])) {
                $action = ConversionService::SecureInput($_POST["action"]);
            } else if ( isset($_GET["action"]) ) {
                $action = ConversionService::SecureInput($_GET["action"]);
            } else {
                $action = "show_users";
                unset($_SESSION["admins"]);                
                unset($_SESSION["users"]);
                unset($_SESSION["departments"]);
                unset($_SESSION["diagnises"]);
            }
        } else {
            $action = ConversionService::SecureInput($_POST["action"]);
            $action = ( $action == "show_login" || 
                        $action == "process_login") ?
                        $action : "show_login";
        }

        $location = $_SERVER["PHP_SELF"];

        require("./views/navbar.php");
    ?>

            <div class="col-10">
    <?php  
        require_once("./controllers/prepare-admin.controller.php");

        switch ($action) {
            case "process_login": {
                require_once("./controllers/login-admin.controller.php");
                require("./views/login.php");
                break;
            }
            case "process_logout": {
                $expiration = time() - 3600;
                setcookie("adminId","",$expiration);
                header("Location: " . $location);
                break;
            }
            // Create
            case "create_admin": {
                require_once("./controllers/create-admin.controller.php");
                require("./views/users.php");
                break;
            }
            case "create_department": {
                require_once("./controllers/create-department.controller.php");
                require("./views/departments.php");
                break;
            }
            case "create_diagnosis": {
                require_once("./controllers/create-diagnosis.controller.php");
                require("./views/diagnoses.php");
                break;
            }
            case "create_user": {
                require_once("./controllers/create-user.controller.php");
                require("./views/users.php");
                break;
            }
            // Delete
            case "delete_admin": {
                require_once("./controllers/delete-admin.controller.php");
                require("./views/users.php");
                break;
            }
            case "delete_user": {
                require_once("./controllers/delete-user.controller.php");
                require("./views/users.php");
                break;
            }
            case "delete_department": {
                require_once("./controllers/delete-department.controller.php");
                require("./views/departments.php");
                break;
            }
            case "delete_diagnosis": {
                require_once("./controllers/delete-diagnosis.controller.php");
                require("./views/diagnoses.php");
                break;
            }
            case "show_login": {
                require("./views/login.php");
                break;
            }
            case "show_users": {
                require("./views/users.php");
                break;
            }
            case "show_departments": {
                require("./views/departments.php");
                break;
            }
            case "show_diagnoses": {
                require("./views/diagnoses.php");
                break;
            }
            // Update
            case "update_diagnosis": {
                require_once("./controllers/update-diagnosis.controller.php");
                require("./views/diagnoses.php");
                break;
            }
            case "update_department": {
                require_once("./controllers/update-department.controller.php");
                require("./views/departments.php");
                break;
            }
            default: {
                require_once("./views/error404.php");
                break;
            }
        }
    ?>

            </div>
        </div>
    </div>
</body>
</html>
