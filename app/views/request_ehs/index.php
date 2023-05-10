<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">

        
<!-- ========================= Main ==================== -->

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <h2>Choose a Beneficiary</h2>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Beneficiaries</h2>
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
                                <?php foreach($data['beneficiaries'] as $beneficiary_details): ?>
                                <td><?php echo $beneficiary_details->B_Id; ?></td>
                                <td><?php echo $beneficiary_details->B_Name; ?></td>
                                <td><?php echo $beneficiary_details->B_Email; ?></td>
                                <td><?php echo $beneficiary_details->B_Tpno; ?></td>
                                <td><?php echo $beneficiary_details->B_Address; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/request_ehs/requestEvents/<?php echo $beneficiary_details->B_Id; ?>"><button class="btn_1">Select</button></td></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>



    <!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/js/eventHost/main.js"></script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>

    

