

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/form.css">

<main>
        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <form class="forms" action="<?php echo URLROOT; ?>/settingsdons/index" method="POST">
                    <div class="container">
                    <h1>Update Profile</h1>
                        <hr>
                        <div class="content-sidebar">
                            <div class="content">
                                <div class="des">
                                    <h3> <label for="Name"><b>Name</b></label></h3>
                                </div>
                            </div>
                            <div class="data">
                                <input type="text" name="D_Name" value="<?php echo $data['D_Name']; ?>" ></input>
                                <div class=warn> <?php if(isset($data['D_Name_err'])) echo $data['D_Name_err']; ?></div>

                            </div>
                            <div class="content">
                                <label for="address"><h3>Address</h3></label>
                            </div>
                            <div class="data">
                                <input type="text" name="D_Address" placeholder="Address" value="<?php echo $data['D_Address']; ?>">
                                <div class=warn> <?php if(isset($data['D_Address_err'])) echo $data['D_Address_err']; ?></div>
                            </div>

                        </div>
                        <div class="content">
                            <label for="telephone_number"><h3>Telephone Number</h3></label>
                        </div>
                        <div class="data">
                            <input type="text" name="D_Tel_No" placeholder="Telephone number" value="<?php echo $data['D_Tel_No']; ?>">
                            <div class=warn> <?php if(isset($data['D_Tel_No_err'])) echo $data['D_Tel_No_err']; ?></div>
                        </div>
                        <input type="submit" class="button button1" value="submit">
                    </div>

                    </form>
            </div>
        </div>
</main>
            </div>
        </div>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
