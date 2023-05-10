<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/form.css">


<!-- ================ Order Details List ================= -->
<div class="details">
    <div class="recentOrders" >
        <div class="cardHeader">
            <a href="<?php echo URLROOT; ?>/settingsehs/viewProfile" class="btn">Back</a>
        </div>
        <form class="forms" action="<?php echo URLROOT; ?>/settingsehs/index" method="POST">
            <div class="container-nav" >
                <h1>Update Profile</h1>
                <hr>
                <div class="content-sidebar" >
                    <div class="content">
                        <div class="des">
                            <h3><label for="Name"><b>Name</b></label></h3>
                        </div>
                    </div>
                    <div class="data">
                        <input type="text" name="E_Name" placeholder="Name" value="<?php echo $data['E_Name']; ?>"></input>
                        <div class=warn> <?php if (isset($data['E_Name_err'])) echo $data['E_Name_err']; ?></div>


                    </div>
                    <!--<div class="content">
                        <label for="address"><h3>Address</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="D_Address" placeholder="Address"
                               value="<?php /*echo $data['D_Address']; */?>">
                        <div class=warn> <?php /*if (isset($data['D_Address_err'])) echo $data['D_Address_err']; */?></div>
                    </div>-->
                    <div class="content">
                        <label for="telephone_number"><h3>Telephone Number</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="E_Tpno" placeholder="Telephone number"
                               value="<?php echo $data['E_Tpno']; ?>">
                        <div class=warn> <?php if (isset($data['E_Tpno_err'])) echo $data['E_Tpno_err']; ?></div>
                    </div>


                    <div class="content">
                        <label for="address"><h3>Address</h3></label>
                    </div>
                    <div class="data">
                        <input type="text" name="E_Address" placeholder="Address"
                               value="<?php echo $data['E_Address']; ?>">
                        <div class=warn> <?php if (isset($data['E_Address_err'])) echo $data['E_Address_err']; ?></div>

                    </div>
                </div>


                <input type="submit" class="button button1" value="submit">
            </div>

        </form>
    </div>
</div>
</div>
</div>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
