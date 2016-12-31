<?php if(!isset($_SESSION)) { session_start();}

/* Require login.php to call login function */
require("classes/classTicket.php");

/* Call for login function */
$ticket = new Ticket();
