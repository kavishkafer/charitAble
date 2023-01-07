<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/donors/list_of_donors"><button class="btn active" >List of donors</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <h2>List of donors</h2>
                        <!-- <h2>Registration requests</h2>  -->
                     <table>
                        <tr>
                            <th>Donor ID</th>
                            <th>Donor Name</th>
                            <th>Email</th>
                            <th>TP</th>
                            <th></th>
                        </tr>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['donor_details'] as $donor_details): ?>
                                <td><?php echo $donor_details->donor_id; ?></td>
                                <td><?php echo $donor_details->donor_name; ?></td>
                                <td><?php echo $donor_details->donor_email; ?></td>
                                <td><?php echo $donor_details->donor_phone; ?></td>
                                <td><a href="#"><button class="btn_1">View Profile</button></td></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

    
</body>

</html>