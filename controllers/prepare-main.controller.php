<?php
    # Controllers - Services   
    require_once("controllers/services/conversion.service.php");
    # Controllers - Classes
    require_once("./controllers/classes/password.class.php");
    # Models
    require_once("./models/db.service.php");
    require_once("./models/users.service.php");
    require_once("./models/report.service.php");
    require_once("./models/diagnoses.service.php");
    require_once("./models/appointments.service.php");
    # Models - ADMIN
    require_once("./admin/models/users-admin.service.php");
    require_once("./admin/models/diagnoses-admin.service.php");
    require_once("./admin/models/departments-admin.service.php");

?>