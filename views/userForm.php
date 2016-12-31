<?php require_once 'header.php'; ?>

<body>
    
    <div class="container">
        
        <!-- Main Container -->
        <div class="container center-block mainContainer">
            
            <!-- Navigation buttons for ticket creation etc. -->
            <div class="mainContainer-header">
                <a href="index.php" role="button" class="btn btn-default btn-sm">Back to main page</a>
            </div>
            
            <div class="mainContainer-body">
                
                <form action="createUser.php" method="post">
                    <div class="form-group mainContainer-form">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" focus required class="form-control"><br>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required class="form-control"><br>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" required class="form-control"><br>
                        <div class="checkbox form-control">
                            <label><input type="checkbox" value="Yes" name="ismoderator">Check if user has helpdesk rights.</label>
                        </div>
                    </div>
                    <input class="btn btn-default btn-sm center-block" name="createUser" value="Create user" type="submit">
                </form>
                
            </div>

    </div> <!-- End Main Container -->

        
</body>
