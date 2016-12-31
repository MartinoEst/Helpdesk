<?php 

class Login{
    
    /* __constructor()
     * Constructor will be called every time Login class is called ($login = new Login())
     */
     public function __construct(){
        
        /* Check if user is logged in. */
        $this->isLoggedIn();
         
        /* If login data is posted call validation function. */
        if (isset($_POST["login"])) {
            $this->validateLogIn();
        }     
                       
    } /* End __construct() */
    
    
    /* function isLoggedIn()
     * Check if user is already logged in, if not then prompt login form.
     */
    public function isLoggedIn(){
        
    /* Require credentials for DB connection. */
    require ('config/dbconnect.php');

        if(!empty(@$_SESSION['user_id'])){   
            return true;        
        } else {    
            return false;
        }

    } /* End isLoggedIn() */
    
    
    /* Function validateLogIn()
    * Function that validates user login data, cross-checks with database.
    */
    function validateLogIn(){

        /* Require credentials for DB connection */
        require ('config/dbconnect.php');

        /* Check that data has been submited */
        if(isset($_POST['username'])){

            /* User input variables converted to string to prevent SQL injections */
            $user = mysqli_real_escape_string($conn,trim($_POST['username']));
            $upassword = mysqli_real_escape_string($conn,trim($_POST['password']));


            /* Check that both fields are filled with values */
            if(!empty($user) && !empty($upassword)){

                /* Query the username from DB, if response is greater than 0 it means that users exists & 
                 * we continue to compare the password hash provided by the user side with the DB data. */

                $sql = "SELECT * FROM `users` WHERE username = '$user' OR shortuser ='$user'";
                $result = mysqli_query($conn, $sql);
                if ($result->num_rows === 1) {
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $_SESSION['company'] = $row['company'];
                    $_SESSION['isadmin'] = $row['isadmin'];
                    if (password_verify($upassword, $row['password'])) {    // Example of password hash : $2y$10$Vgl0Wxr3DNfJc.Y52YiVOOePENcjQPJ88mrEacKP15S9kIhx.u6gy
                        header('Location: index.php');                // If passwords are correct user is taken to main page.
                        $_SESSION['user_id'] = $row['username'];                     // Username is set as Session user_id for this user.
                    } else {
                        header('Location: ../login.php?login=false');    // Else login is given the GET value of login.php?false that is later used to show error of wrong user/password to user.
                        $login = FALSE;
                    }   /* /EndIF */
                }   /* /EndIF */
            }   /* /EndIF */
        } else {
            echo 'Please fill all fields.'; // Prompt user to fill all fields.
        }   /* /EndIF */

    }   /* End logValidation()) */
    
}
