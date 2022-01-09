<?php

use CRUD\Controller\PersonController;

include "loader.php";

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "test";

// $db = mysqli_connect($servername, $username, $password, $dbname);

// if (!$db) {
//     die("Connection failed: " . mysqli_connect_error());
// } else {
//     echo "Connected successfully";
// }

$controller = new PersonController();
$controller->switcher($_SERVER['REQUEST_URI'], $_REQUEST);
