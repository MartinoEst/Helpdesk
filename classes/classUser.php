<?php 

class User{
    
    /* __constructor()
     * Constructor will be called every time Login class is called ($login = new Login())
     */
     public function __construct(){
 
        /* If login data is posted call validation function. */
        if (isset($_POST["createUser"])) {
            $this->newUser();
        }     
        /* If login data is posted call validation function. */
        if (isset($_POST["registration"])) {
            $this->companyReg();
        }     
                       
    } /* End __construct() */
    
    
    /* Function newUser(){
    * Function that includes everything for new user creation.
    * Data is taken from newuser.php form, converted to prevent SQL injection and
    * checked that values are filled, if all is correct data is entered to user database.
    */
    function newUser(){

        /* Require credentials for DB connection */
        require ("config/dbconnect.php");

        /* Different session variables for SQL query */
        $company = $_SESSION['company'];

        /* Check that data has been submitted */
        if(isset($_POST['username'])){

            /* User input variables converted to string to prevent SQL injections */
            $username = mysqli_real_escape_string($conn,trim($_POST['username']));  
            $password = mysqli_real_escape_string($conn,trim($_POST['password']));
            $securing = password_hash($password, PASSWORD_DEFAULT);
            $email = mysqli_real_escape_string($conn,($_POST['email']));
            $shortUser = substr($company, 0, 2) . substr($username, 0, 3) . substr($username, -1);
            if(isset($_POST['ismoderator']) && $_POST['ismoderator'] == "Yes"){
                $ismoderator = 1;
            } else {
                $ismoderator = 0;
            }

            if(!empty($username) && !empty($password) && !empty($email)){      // If fields are filled then continue to insert it into database.
                $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `company`, `isadmin`, `shortuser`) VALUES ('', '$username', "
                        . "'$email', '$securing', '$company', '$ismoderator', '$shortUser');";
                $result = mysqli_query($conn, $sql);
                header('Location: createUser.php?created=true');    // Return user to newuser.php
            }   /* /EndIF */

        }   /* /EndIF */ 

    }   /* End newUser()) */
    
    
    /* Function companyReg(){
    * Function that includes new company registration to HelpIT portal.
    * Data is taken from registration.php form, converted to prevent SQL injection and
    * checked that values are filled, if all is correct data is entered to user database.
    */
    function viewUsers(){

        /* Require credentials for DB connection */
        require ("config/dbconnect.php");


            /* User input variables converted to string to prevent SQL injections */
            $company = $_SESSION['company'];    // Provides us company name.
            $sql = "SELECT * FROM `users` WHERE company = '$company'";
            $result = mysqli_query($conn, $sql);    // SQL query result.
            include("views/memberListView.php"); 

    }   /* End companyReg()) */

    
    /* Function companyReg(){
    * Function that includes new company registration to HelpIT portal.
    * Data is taken from registration.php form, converted to prevent SQL injection 
    * and checked that values are filled and cross checked againts database to  
    * confirm that the company name doesn't exist already.
    */
    function companyReg(){

        /* Require credentials for DB connection */
        require ("config/dbconnect.php");


        /* Check that data has been submitted */
        if(isset($_POST['username'])){

            /* User input variables converted to string to prevent SQL injections */
            $username = mysqli_real_escape_string($conn,trim($_POST['username']));  
            $password = mysqli_real_escape_string($conn,trim($_POST['password']));
            $securing = password_hash($password, PASSWORD_DEFAULT);
            $email = mysqli_real_escape_string($conn,($_POST['email']));
            $company = mysqli_real_escape_string($conn,trim($_POST['company']));
            $shortUser = substr($company, 0, 2) . substr($username, 0, 3) . substr($username, -1);

            if(!empty($username) && !empty($password) && !empty($email)){      // If fields are filled then continue to cross check with database againt same company names
                $checkavailable = "SELECT * FROM `users` WHERE company = '$company'"; // Query to cross check Company name with database.
                $result = mysqli_query($conn, $checkavailable);
                if ($result->num_rows != 0) {      // If company with the same name is found
                    header('Location: registration.php?created=false');    // Return user to newuser.php
                    $registered = FALSE;
                } else {    // If no company is found with the same name
                    $sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `company`, `isadmin`, `shortuser`) VALUES ('', '$username', "
                            . "'$email', '$securing', '$company', '1', '$shortUser');";
                    $result = mysqli_query($conn, $sql);
                    header('Location: registration.php?created=true');    // Return user to newuser.php
                }
            }   /* /EndIF */
        }   /* /EndIF */ 

    }   /* End companyReg()) */
    
}

