<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ======================= Buttons ================== -->
    <div class="btnBox">
                <a href="<?php echo URLROOT; ?>/eventHosters/registration_requests"><button class="btn active" >Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters"><button class="btn" >Event Hosters' List</button></a>
            </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Event Hosters - Registration Requests</h2>
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
                <tbody>
                    <tr>
                        <?php foreach($data['reg_eveHosts'] as $reg_eveHosts): ?>
                        <td><?php echo $reg_eveHosts->E_ID; ?></td>
                        <td><img src ="<?php echo URLROOT; ?>/public/img/admin/customer02.jpg"
                            style="hight:50px; width:50px; border-radius:50%;" alt="Profile Picture"></td>
                        <td><?php echo $reg_eveHosts->E_Name; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/eventHosters/view_request/<?php echo $reg_eveHosts->E_ID; ?>"><button class="btn_1">View Request</button></td>
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