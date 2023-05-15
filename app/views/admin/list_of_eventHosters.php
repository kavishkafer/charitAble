<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">


<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ======================= Buttons ================== -->
    <div class="btnBox">
                <a href="<?php echo URLROOT; ?>/eventHosters/registration_requests"><button class="btn">Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters"><button class="btn active">Event Hosters' List</button></a>
            </div>


    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Event Hosters' List</h2>

            </div>
            <table>
                <thead>
                    <tr>
                        <td>Event Hoster ID</td>
                        <td>Profile Picture</td>
                        <td>Event Hoster Name</td>
                        <td>Action</td>
                    </tr>
                </thead>



    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
    <script src='<?php echo URLROOT; ?>/public/admin/js/searchEventHosters.js'></script>
    

</body>

</html>