<?php
if(!isset($_SESSION)) { session_start();} 
      
/* Require login.php to call login function */
require("classes/classLogin.php");

/* Call for login function */
$login = new Login();

/* If user is logged in prompt them member index page, if guest user then prompt guest index page */
if($login->isLoggedIn() == true){
  include("views/memberIndex.php");
} else {
  include("views/guestIndex.php");
}


