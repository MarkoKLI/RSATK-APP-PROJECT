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

for($i=1;$i<11;$i++) {
    DepartmentsAdminService::createDepartment("Specialty " . $i ,
    "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
}

var_dump($arr);

//var_dump(UsersAdminService::getAdminPasswordDetailsByUsername("admin"));

// UsersAdminService::createAdmin("admin","admin");


?>