<!--

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
                        <th>Your company members:</th>

                      </tr>
                    </thead>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="col-md-1"><?php echo ucfirst($row['username']) ?></td>

                    </tr>
                <?php endwhile; ?>
                <?php endif; ?>
                </table>
            </div>

        </div> <!-- End Main Container -->
    
</body>   