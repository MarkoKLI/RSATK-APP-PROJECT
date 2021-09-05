<?php 
// Fajlov e za testiranje funkcii i generalno stvari izolirano od aplikacijata
// Treba da se izbrise na kraj
include("./models/db.service.php");
include("./models/users-admin.service.php");
include("./models/departments-admin.service.php");
include("./models/diagnoses-admin.service.php");

// $specialtyId = NULL;
// $isDoctor = false;
// // echo AdminUsersService::createUser("Jack","Ryan","1234567891234","this@that.test","075500000",
// //                             "05.10.2020","12345", $specialtyId,"yo momma", $isDoctor);

// //var_dump(UsersService::getUserPasswordByEmail("this@that.test"));
// $result = UsersService::getUserPasswordByEmail("this@that.test");
// echo !Password::validatePassword($result['passwordHash'], $result['passwordSalt'], "122345");

echo filter_input(INPUT_SERVER,"HTTP_HOST");
echo "<br>";
echo filter_input(INPUT_SERVER,"REQUEST_URI");


//var_dump(UsersAdminService::getAdminDetailsByUsername("admin"));

// UsersAdminService::createAdmin("admin","admin");


?>