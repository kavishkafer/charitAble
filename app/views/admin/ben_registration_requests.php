<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button class="btn active" >Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn" >Beneficiaries' List</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                     <table>
                       <thead>
                            <tr>
                                <td>ID</td>
                                <td>Beneficiary Name</td>
                                <td>Beneficiary Address</td>
                                <td>Email</td>
                                <td>TP</td>
                                <td></td>
                            </tr>
                        </thead>
                         <tbody> 
                         <tr>
                                <?php foreach($data['reg_bens'] as $reg_bens): ?>
                                <td><?php echo $reg_bens->B_Id; ?></td>
                                <td><?php echo $reg_bens->B_Name; ?></td>
                                <td><?php echo $reg_bens->B_Address; ?></td>
                                <td><?php echo $reg_bens->B_Email; ?></td>
                                <td><?php echo $reg_bens->B_Tpno; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/beneficiaries/view_request/<?php echo $reg_bens->B_Id; ?>"><button class="btn_1">View Request</button></td>
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