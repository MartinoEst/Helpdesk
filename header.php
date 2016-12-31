<?php if(!isset($_SESSION)) { session_start();} ?>

<head>
    <meta charset="UTF-8">
    <title>HelpIT - Lihtne helpdesk lahendus</title>
    <meta name="viewport" content="width=device-width,  initial-scale=0.8">
    
    <!-- Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
</head>
    
<header>

<!-- Navbar -->
<nav class="navbar navbar-default">
   
    <div class="container-fluid">
        
        <div class="container">
            
            <!-- Collapse navigation menu for mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>   <!-- /Collapse menu -->     
    
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php" >
                    <img alt="logo" src="assets/img/logo.png">
                </a>    
            </div>  <!-- /Logo -->
            
            <!-- Navigation buttons -->
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!empty(@$_SESSION['user_id'])): ?>
                    <!-- Navigation links for desktop clients -->
                    <li>
                        <a href="profile.php" class="hidden-xs"><span class="glyphicon glyphicon-user"></span> Account</a>
                    </li>
                    <li>
                        <a href="logout.php" class="hidden-xs"><span class="glyphicon glyphicon-log-out"></span> Sign out</a>
                    </li>
                    <!-- Navigation links for mobile clients -->
                    <li>
                        <a href="#" class="btn btn-default btn-outline visible-xs">Account</a>
                    </li>
                    <li>
                        <a href="logout.php" class="btn btn-default btn-outline visible-xs">Sign out</a>
                    </li>
                    <!-- This login form is provided for desktop client if user isn't logged in -->
                    <?php else: ?>
                    <li>
                        <form class="navbar-form hidden-xs" action="index.php" method="post">
                            <div class="form-group">
                                <input type="text" placeholder="User" name="username" class="form-control">
                                </div>
                            <div class="form-group">
                                <input type="password" placeholder="Password" name="password" class="form-control">
                                </div>
                            <button type="submit" name="login" class="btn btn-success">Log in</button>
                        </form>
                    </li>
                    <!-- This login link is provided for mobile client if user isn't logged in -->
                    <li>
                        <a href="login.php" class="btn btn-default btn-outline visible-xs">Log In</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <!-- Prompt user description text -->
                <?php if(!empty(@$_SESSION['user_id'])): ?>
                <p class="navbar-text"><?php echo "You are signed in as <b>" . $_SESSION['user_id'] . "</b>. Company: <b>" . $_SESSION['company'] ."</b>." ;?></p>
                <?php endif; ?>
                
            </div> <!-- /Navigation buttons -->
            
        </div>
        
    </div>
    
</nav>  <!-- /Navbar -->
    
</header>



