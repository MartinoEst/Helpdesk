<?php require_once 'header.php'; ?>

<!--  This page with all ticket functions is shown to logged in users only  -->

<body>
    <div class="container">
        
        <!-- Main Container -->
        <div class="container center-block mainContainer">
            
            <!-- Navigation buttons for ticket creation etc. -->
            <div class="mainContainer-header">
                <a href="createTicket.php" role="button" class="btn btn-default btn-sm">Create a new ticket</a>
                <a href="userTickets.php" role="button" class="btn btn-default btn-sm">View tickets</a>
            <!--  If the logged in user is helpdesk support for his company, provide him with "New user" and "Memberlist" button.  -->
                <?php if($_SESSION['isadmin'] == 1): ?>
                    <a href="createUser.php" role="button" class="btn btn-default btn-sm">Create a new user</a>
                    <a href="memberList.php" role="button" class="btn btn-default btn-sm">View users</a>
                <?php endif; ?>
            </div><!-- End mainContainer-header -->
            
            <div class="mainContainer-body">
                    <h4 class="bg-success">Hi, this is short introduction on how to use our portal.</h4>
                    <b>Create a new ticket</b><br>
                    <p>To create a ticket user must choose <kbd>Create a new ticket</kbd> from the top menu bar, after filling the required fields user has to press "Submit" to send the ticket. It's as easy as that!</p>
                    <b>View tickets</b><br>
                    You can view your tickets from <kbd>View tickets</kbd> button from the top menu bar, you will be able to see to whom the ticket is forwarded and what status it has.</p>
                    <h4 class="bg-success">Have suggestions or need to contact us?</h4>
                    <b>Have an awesome suggestion for us?</b><br>
                    <p>Feel free to send any suggestions to: <kbd>suggestions@helpit.com</p>
                    <b>Need to contact us?</b><br>
                    Feel free to send an email to: <kbd>contact@helpit.com</kbd>
            </div><!-- End mainContainer-body -->

        </div> <!-- End Main Container -->

    </div> 
</body>