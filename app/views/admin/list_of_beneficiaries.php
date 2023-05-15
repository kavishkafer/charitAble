<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <!-- <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button class="btn" >Registration_Requests</button></a>
                <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn active" >Beneficiaries' List</button></a>
            </div> -->
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Beneficiaries' List</h2>
                    </div>
                        
                     <table>
                        <thead>
                            <tr>
                                <td>Beneficiary ID</td>
                                <td>Benificiary Name</td>
                                <td>Email</td>
                                <td>TP</td>
                                <td>Address</td>
                                <td></td>
                            </tr>
                        </thead>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['beneficiary_details'] as $beneficiary_details): ?>
                                <td><?php echo $beneficiary_details->B_Id; ?></td>
                                <td><?php echo $beneficiary_details->B_Name; ?></td>
                                <td><?php echo $beneficiary_details->B_Email; ?></td>
                                <td><?php echo $beneficiary_details->B_Tpno; ?></td>
                                <td><?php echo $beneficiary_details->B_Address; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/beneficiaries/view_profile/<?php echo $beneficiary_details->B_Id; ?>"><button class="btn_1">View Profile</button></td></a></td>
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