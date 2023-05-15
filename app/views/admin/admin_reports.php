<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/reports.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <?php require APPROOT . '/views/inc/topbar.php'; ?>
    <div class="details">
        <div class="recentOrders">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">Donations</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="<?php echo URLROOT; ?>/completedDonations">Completed Donations</a>
                    <a href="<?php echo URLROOT; ?>/expiredDonations">Expired Donations</a>
                    <a href="<?php echo URLROOT; ?>/donationComparison">Donation Comparison</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/admin/reports.js"></script>

</body>

</html>