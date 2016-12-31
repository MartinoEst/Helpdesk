<?php require_once 'header.php'; ?>

<?php
/* Require login.php to call login function */
require("classes/classUser.php");

/* Call for login function */
$user = new User();

$user->viewUsers();