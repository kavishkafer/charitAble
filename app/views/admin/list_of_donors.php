<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/donors/list_of_donors"><button class="btn active" >Donors' List</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Donors</h2>
                    </div>
                        
                     <table>
                        <thead>
                            <tr>
                                <td>Donor ID</td>
                                <td>Donor Name</td>
                                <td>Donor Email</td>
                                <td>Address</td>
                                <td></td>
                            </tr>
                        </thead>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['donor_details'] as $donor_details): ?>

                                <td><?php echo $donor_details->D_Id; ?></td>
                                <td><?php echo $donor_details->D_Name; ?></td>
                                <td><?php echo $donor_details->D_Email; ?></td>
                                <td><?php echo $donor_details->D_Address; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/donors/view_profile/<?php echo $donor_details->D_Id; ?>"><button class="btn_1">View Profile</button></td></a></td>

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