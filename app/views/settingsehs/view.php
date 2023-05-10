
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/event_hoster/settings.css" xmlns="http://www.w3.org/1999/html">

<!-- ================ Order Details List ================= -->
<div class="button-pwd">
    <a href="<?php echo URLROOT ?>/settingsehs/viewProfile "> <input type="submit" class="button button3" value="Edit profile"></a>
    <a href="<?php echo URLROOT ?>/updatepwds/index "> <input type="submit" class="button button4" value="Change Password"></a>
</div>
<div class="details">
    <div class="recentOrders">

        <div class="cardHeader">
        </div>
        <div class="container-nav">

            <h1>Update Profile</h1>
            <hr>
            <div class="content-sidebar">
                <div class="content">
                    <!--                            <div class="des" style="background-color: red">
                    -->                                <h3> <label for="Name"><b>Name</b></label></h3>
                    <!--                            </div>
                    -->                        </div>
                <div class="data">
                    <input type="text" name="E_Name" value="<?php echo $data['E_Name']; ?>" disabled></input>
                    <div class=warn> <?php if(isset($data['E_Name_err'])) echo $data['E_Name_err']; ?></div>

                </div>

                <div class="content">
                    <label for="telephone_number"><h3>Telephone Number</h3></label>
                </div>
                <div class="data">
                    <input type="text" name="E_Tpno" placeholder="telephone number" value="<?php echo $data['E_Tpno']; ?>" disabled>
                    <div class=warn> <?php if(isset($data['E_Tpno_err'])) echo $data['E_Tpno_err']; ?></div>
                </div>

                <div class="content">
                    <label for="address"><h3>Address</h3></label>
                </div>
                <div class="data">

                    <input type="text" name="E_Address" placeholder="Address" value="<?php echo $data['E_Address']; ?>" disabled>
                    <div class=warn> <?php if(isset($data['E_Address_err'])) echo $data['E_Address_err']; ?></div>

                </div>

            </div>
        </div>
        <div class="button-alignment">
            <a href="<?php echo URLROOT ?>/SettingsEhs/index "> <input type="submit" class="button button1" value="Edit your profile"></a>
        </div>
    </div>
</div>

</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
