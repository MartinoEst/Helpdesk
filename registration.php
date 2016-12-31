<?php if(!isset($_SESSION)) { session_start();} 
      
/* Require login.php to call login function */
require("classes/classUser.php");

/* Call for login function */
$user = new User(); 
?>

<?php    include_once 'header.php'; ?>

<body>
    
    <div class="container row center-block adjustments">
        <div class="col-md-2 col-md-offset-2">
            <img src="images/cloud.png" class="img-responsive center-block">
            <p><h4><center>Access Everywhere</center></h4></p>
            <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</center></p>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <img src="images/padlock.png" class="img-responsive center-block">
            <p><h4><center>Secure</center></h4></p>
            <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</center></p>
        </div>
        <div class="col-md-2 col-md-offset-1">
            <img src="images/tablet.png" class="img-responsive center-block">
            <p><h4><center>Responsive</center></h4></p>
            <p><center>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</center></p>
        </div>
    </div>

    <div class="container usercreation">
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="username">Full name:</label>
                <input type="text" name="username" id="username" focus required class="form-control"><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required class="form-control"><br>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required class="form-control"><br>
                <label for="company">Company:</label>
                <input type="text" name="company" id="company" focus required class="form-control"><br>
            </div>
            <input class="btn btn-success" value="Submit" name="registration" type="submit">
            <a href="index.php" role="button" class="btn btn-success">Cancel</a>
        </form>
        <?php if(@$_GET['created'] == 'true'): ?>
            <div class="alert alert-success">
                <strong><center>Your user has been created. <a href="login.php">Click here to log in.</a></center></strong>
            </div>
        <?php elseif (@$_GET['registered'] == 'false'): ?>
            <div class="alert alert-danger">
                <strong><center>Email on juba kasutusel.</center></strong>
            </div>
        <?php endif; ?>
    </div>
    
</body>
