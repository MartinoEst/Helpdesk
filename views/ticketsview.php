<?php require_once 'header.php';?>
<body>
    
    <div class="container">
        
        <!-- Main Container -->
        <div class="container center-block mainContainer">
            
            <!-- Navigation buttons for ticket creation etc. -->
            <div class="mainContainer-header">
                <a href="userTickets.php" role="button" class="btn btn-default btn-sm">Back to tickets page</a>
            </div>
            
            <div class="mainContainer-body">
                
                <?php if ($result->num_rows > 0): ?>
        
                    <?php while($row = $result->fetch_assoc()): ?>

                        <?php if($_SESSION['isadmin'] != 1): ?>
                        <fieldset disabled>
                        <?php endif; ?>

                        <form action="userTickets.php" method="post" name="updateTicket">

                            <div class="form-group mainContainer-form">
                                <div class="cnt header"><h3>Ticket view</h3></div>
                                <label for="id">Ticket ID:</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo ucfirst($row['id']) ?>">
                                <label for="category">Ticket category:</label>
                                <select class="form-control" id="category" name="category" value="<?php echo ucfirst($row['category']) ?>">
                                    <option>Software issue/installation</option>
                                    <option>Buy/Purchase request</option>
                                    <option>Access rights request</option>
                                    <option>Other</option>
                                </select>
                                <label for="content">Content:</label>
                                <textarea class="form-control" rows="5" id="content" name="content"><?php echo ucfirst($row['content']) ?></textarea>
                                <label for="forwardedto">Forwarded:</label>
                                <input type="text" class="form-control" id="forwardedto" name="forwardedto" value="<?php echo ucfirst($row['forwardedto']) ?>">
                                <label for="status">Status:</label>
                                <select class="form-control" id="status" name="status" value="<?php echo ucfirst($row['status']) ?>">
                                    <option>Open</option>
                                    <option>On hold</option>
                                    <option>In progress</option>
                                    <option>Closed</option>
                                </select>


                               
                            </div>
                                <?php if($_SESSION['isadmin'] == 1): ?>
                                <input class="btn btn-default btn-sm center-block" value="Update" name="updateTicket" type="submit">
                                <?php endif; ?>


                        </form>
                        <!-- End Registration Form -->

                        </fieldset>

                    <?php endwhile; ?>

                <?php endif; ?>
                
            </div>

        </div> <!-- End Main Container -->
        
    
</body>