<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS CDN source -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- JQuery, Popper and Bootstrap CSS CDN source -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS CDN source-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>As yet unnamed</title>

    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
    <h3> РСАТК ПРОЕКТ АПЛИКАЦИЈА </h3>
    <?php
        require("controllers/services/conversion.service.php");

        if ( isset($_POST["action"]) ) {
            $action = ConversionService::SecureInput($_POST["action"]);
        } else if ( isset($_GET["action"]) ) {
            $action = ConversionService::SecureInput($_GET["action"]);
        } else {
            $action = "show_home";
        }

        $location=$_SERVER['PHP_SELF'];

        switch ($action) {
            case "process_login": {
                require("controllers/login.controller.php");
                $action = "show_login";
                break;
            }
            case "process_logout": {
                $expiration = time() - 3600;
                setcookie("userType", "", $expiration);
                setcookie("userId", "", $expiration);
                $action = "show_home";
                break;
            }
        }
        
        require_once("views/navbar.php");

        switch ($action) {
           
            case "show_login": {
                require("views/login.php");
                break;
            }
            case "show_home": {
                require("views/home.php");
                break;
            } 
            case "show_profile": {
                require("views/profile.php");
                break;
            }
            case "show_appointments": {
                require("views/appointments.php");
                break;
            }
            case "show_patients": {
                require("views/patients.php");
                break;
            }
            default: {
                require("views/error404.php");
                break;
            }
        }

        require_once("views/footer.php");
    ?>
</body>
</html>
