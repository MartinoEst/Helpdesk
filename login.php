<?php if(!isset($_SESSION)) { session_start();} 
      
/* Require login.php to call login function */
require("classes/classLogin.php");

/* Call for login function */
$login = new Login(); 
?>

<?php    include_once 'header.php'; ?>

<body>
        
<div class="container">

    <!-- Login form -->
    <div class="loginForm">
        
        <form  action="login.php" name="loginform" class="form-login" method="post">
            <h3 class="cnt">Welcome back!</h3>
            <hr class="colorgraph">
            
            <input type="text" name="username" id="username" placeholder="Username" class="input form-control" autocomplete="off" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" class="input form-control" autocomplete="off" required><br>
            
            <input type="submit"  name="login" value="Sign In" class="btn btn-lg btn-block submit" /> 
        </form>
        
        <!-- This error will be shown to user if wrong username or password is provided -->    
        <?php if(!empty(@$_SESSION['errorMessage'] == 1)): ?>
            <div class="alert alert-danger">
                <strong><center>Username or password is incorrect!</center></strong>
            </div>
        <?php endif; ?>
        
    </div>  <!-- End loginForm-->
 
    <!-- URL to registration form -->
    <div class="cnt"><a href="registration.php">Dont have an account? Create one</a></div>
    
</div>
   
</body>
    

