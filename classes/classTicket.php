<?php

class Ticket{
    
    /* __constructor()
     * Constructor will be called every time Login class is called ($ticket = new Ticket())
     */
     public function __construct(){
         
        /* If login data is posted call validation function. */
        if (isset($_POST["ticket"])) {
            $this->newTicket();
        }     
        if(isset($_GET['id'])){
            $this->openTicket();
        }
        if (isset($_POST["updateTicket"])) {
            $this->updateTicket();
        }   
                       
    } /* End __construct() */
    
    
    /*  Function newTicket()
    *  Is called when user submits a new ticket.
    *  User data is converted to strings to prevent SQL injection.
    *  Submitted fields are checked to not be empty, if required data is filled then the data is inserted to MySQL database.
    */
   function newTicket(){

        /* Require credentials for DB connection */
        require ("config/dbconnect.php");

        /* Different session variables for SQL query */
        $user = $_SESSION['user_id'];       // Provides us username.
        $company = $_SESSION['company'];    // Provides us company name.

        /* Check that data has been submitted */
        if(isset($_POST['category'])){
            $category = mysqli_real_escape_string($conn,trim($_POST['category']));  // Converted to prevent SQL injection.
            $content = mysqli_real_escape_string($conn,($_POST['content']));        // Converted to prevent SQL injection.

            if(!empty($category) && !empty($content)){      // If fields are filled then continue to insert it into database.
                $sql = "INSERT INTO `tickets` (`id`, `content`, `user`, `email`, `forwardedto`, `status`, `category`, `company`) VALUES ('', '$content', "
                        . "'$user', '', '', 'Open', '$category', '$company');";
                $result = mysqli_query($conn, $sql);    // SQL query result.
                header('Location: index.php?created=true');  // Return user to index.php
            }
        }

    } /* End newTicket()) */

    
    /*  Function myTickets()
    *  Uses session variables to assign username, company and identify if the user is moderator for his company.
    *  If the user is moderator for his company ticketsAdm view is called, otherwise regular user view will be returned.
    */
    function myTickets(){

        /* Require credentials for DB connection */
        require ('config/dbconnect.php');


        /* Different session variables for choosing the correct users view */
        $user = $_SESSION['user_id'];       // Provides us username.
        $isadmin = $_SESSION['isadmin'];    // Provides us if the user is a moderator for his company.
        $company = $_SESSION['company'];    // Provides us company name.

        if($isadmin == 1){
            $sql = "SELECT * FROM `tickets` WHERE company = '$company'";    // If the user is moderator for his company he will see all of his companies tickets.
            $result = mysqli_query($conn, $sql);    // SQL query result.
            include("views/supportTicketView.php"); 
        } else {
            $sql = "SELECT * FROM `tickets` WHERE user = '$user'";          // Else user will only see his own tickets.  
            $result = mysqli_query($conn, $sql);    // SQL query result.;
            include("views/memberTicketView.php"); 
        }

    } /* End myTickets() */
    
    
    /*  Function openTicket()
    *  Opens user ticket view, checks that user is the owner of that ticket.
    */
    function openTicket(){
    
    /* Require credentials for DB connection */
    require ('config/dbconnect.php');

    /* Different session variables for SQL query */
    $ticketid = $_GET['id'];            // Provides us the ticket ID that is viewed.
    $user = $_SESSION['user_id'];       // Provides us username.
    $helpdesk = $_SESSION['isadmin'];  // Provides us if the user is a moderator for his company.
    $company = $_SESSION['company'];    // Provides us company name.

    if($helpdesk == 0){
        $sql = "SELECT * FROM `tickets` WHERE id = '$ticketid' AND user ='$user' ";    // If the user isn't a moderator he can only see his own tickets, even when changing the "id=*" in URL.
    } else {
        $sql = "SELECT * FROM `tickets` WHERE id = '$ticketid' AND company ='$company' ";    // If the user is a moderator he can see all tickets from his company, even when manipulation the URL.
    }

    $result = mysqli_query($conn, $sql);    // SQL query result.

    /* Include ticketsview.php to build the ticket view page */
    include("views/ticketsview.php"); 

    } /* End openTicket() */
    
    
    /*  Function newTicket()
    *  Is called when user submits a new ticket.
    *  User data is converted to strings to prevent SQL injection.
    *  Submitted fields are checked to not be empty, if required data is filled then the data is inserted to MySQL database.
    */
    function updateTicket(){

        /* Require credentials for DB connection */
        require ("config/dbconnect.php");

        /* Different session variables for SQL query */
        $user = $_SESSION['user_id'];       // Provides us username.
        $company = $_SESSION['company'];    // Provides us company name.

        /* Check that data has been submitted */
        if(isset($_POST['status'])){
            $ticketid = mysqli_real_escape_string($conn,trim($_POST['id']));
            $category = mysqli_real_escape_string($conn,trim($_POST['category']));  // Converted to prevent SQL injection.
            $forwardedto = mysqli_real_escape_string($conn,($_POST['forwardedto']));        // Converted to prevent SQL injection.
            $status = mysqli_real_escape_string($conn,($_POST['status']));        // Converted to prevent SQL injection.

            if(!empty($status)){      // If fields are filled then continue to insert it into database.
                $sql = " UPDATE `tickets` SET `forwardedto` = '$forwardedto', `status` = '$status', `category` = '$category' WHERE `tickets`.`id` = '$ticketid'; ";
                $result = mysqli_query($conn, $sql);    // SQL query result.
                header('Location: userTickets.php');  // Return user to index.php
            }
        }

   } /* End newTicket()) */
    
   
   function forwardTo(){
    /* Require credentials for DB connection */
    require_once 'config/dbconnect.php';

    $user = $_SESSION['user_id'];       // Provides us username.
    $sql = "UPDATE `tickets` SET `forwardedto` = '$user' WHERE `tickets`.`id` = 4;";
    $result = mysqli_query($conn, $sql);

    //UPDATE `tickets` SET `forwardedto` = '$user' WHERE `tickets`.`id` = 4;

    header('Location: ../index.php');

    }
   
}