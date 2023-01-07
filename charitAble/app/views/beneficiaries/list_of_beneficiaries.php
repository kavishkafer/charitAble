<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button class="btn" >Registration_requests</button></a>
                <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn active" >List of beneficiaries</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <h2>List of beneficiaries</h2>
                        <!-- <h2>Registration requests</h2>  -->
                     <table>
                        <tr>
                            <th>Beneficiary ID</th>
                            <th>Benificiary Name</th>
                            <th>Email</th>
                            <th>TP</th>
                            <th></th>
                        </tr>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['beneficiary_details'] as $beneficiary_details): ?>
                                <td><?php echo $beneficiary_details->beneficiary_id; ?></td>
                                <td><?php echo $beneficiary_details->beneficiary_name; ?></td>
                                <td><?php echo $beneficiary_details->beneficiary_email; ?></td>
                                <td><?php echo $beneficiary_details->beneficiary_phone; ?></td>
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