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
                <?php if ($result->num_rows > 0): ?>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Doc nr.</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Forwarded to:</th>
                        </tr>
                    </thead>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="col-md-1"><?php echo ucfirst($row['id']) ?></td>
                        <td class="col-md-6"><a href="ticket.php?id=<?php echo ucfirst($row['id'])?>"><?php if(($row['status']) == 'Closed'):?><del><?php endif; ?><?php echo ucfirst(substr($row['content'],0,90)) ?></a></td>   
                        <td class="col-md-1"><?php echo ucfirst($row['status']) ?></td>
                        <td class="col-md-1"><?php echo ucfirst($row['user']) ?></td>
                        <td class="col-md-1"><?php echo ucfirst($row['forwardedto']) ?></td>
                    </tr>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>

        </div> <!-- End Main Container -->
    
   
    
</body>