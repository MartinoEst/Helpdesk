<?php require_once 'header.php';?>
<body>

    <div class="container">
        
        <!-- Main Container -->
        <div class="container center-block mainContainer">
            
            <!-- Navigation buttons for ticket creation etc. -->
            <div class="mainContainer-header">
                <a href="index.php" role="button" class="btn btn-default btn-sm">Back to main page</a>
            </div>
            
            <div class="mainContainer-body">
                <form action="createTicket.php" method="post">
                    <div class="form-group mainContainer-form">
                        <label for="category">Ticket category:</label>
                        <select class="form-control mobile-view" id="category" name="category" required autofocus>
                            <option>Software issue/installation</option>
                            <option>Buy/Purchase request</option>
                            <option>Access rights request</option>
                            <option>Other</option>
                        </select>
                        <label for="content">Content:</label>
                        <textarea class="form-control mobile-view" rows="5" id="content" name="content" required ></textarea>
                    </div>
                    <input class="btn btn-default btn-sm center-block" name='ticket' value="Submit" type="submit">
                </form>
            </div>

        </div> <!-- End Main Container -->
    
</body> 

