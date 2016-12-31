<?php if(!isset($_SESSION)) { session_start();} 

/* Require login.php to call login function */
require("classes/classUser.php");

/* Call for login function */
$user = new User();

include 'views/userForm.php';