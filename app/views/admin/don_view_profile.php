<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <!-- <a href="<?php echo URLROOT; ?>/beneficiaries/registration_requests"><button class="btn active" ><?php echo $data['donor']->D_fName; ?></button></a> -->
                <!-- <a href="<?php echo URLROOT; ?>/beneficiaries/list_of_beneficiaries"><button class="btn active" >List of beneficiaries</button></a> -->
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <h2><?php echo $data['donor']->D_Name; ?></h2>

                    <div class="details-card">
                        <div class="details-head">Donor ID :-</div>

                        <div class="details-input"><?php echo $data['donor']->D_Id; ?></div>

                    <div>
                    <br />

                    <div class="details-card">
                        <div class="details-head">Donor Name :-</div>
                        <div class="details-input"><?php echo $data['donor']->D_Name; ?></div>
                    <div>
                    <br />

                    <div class="details-card">
                        <div class="details-head">Donor Name :-</div>
                        <div class="details-input"><?php echo $data['donor']->D_Email; ?></div>
                    <div>
                    <br />

                    <div class="details-card">
                        <div class="details-head">Donor Address :-</div>
                        <div class="details-input"><?php echo $data['donor']->D_Address; ?></div>
                    <div>
                    <br />
                </div>
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

    
</body>

</html>