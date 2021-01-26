<?php 
    session_start();
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
    
    <link rel="stylesheet" href="styles/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>As yet unnamed</title>
</head>

<body>
    <div class="container-fluid">
        <div class="navbar navbar-light">
            <h1>РСАТК Проект - Администрација</h1>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
    <?php
        require_once("../controllers/services/conversion.service.php");
        
        if ( isset($_POST["action"]) ) {
            $action = ConversionService::SecureInput($_POST["action"]);
        } else if ( isset($_GET["action"]) ) {
            $action = ConversionService::SecureInput($_GET["action"]);
        } else {
            $action = "show_home";
        }

        $location = $_SERVER["PHP_SELF"];

        require("./views/navbar.php");
    ?>

            <div class="col-10">
    <?php  
        switch ($action) {
            case "show_home": {
                require_once("./views/home.php");
                break;
            } 
            case "show_login": {
                require_once("./views/login.php");
                break;
            }
            case "show_users": {
                require_once("./views/users.php");
                break;
            }
            case "show_departments": {
                require_once("./views/departments.php");
                break;
            }
            case "show_diagnoses": {
                require_once("./views/diagnoses.php");
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
