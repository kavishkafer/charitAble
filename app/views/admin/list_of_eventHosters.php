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


                <tbody>
                    <tr>
                        <?php foreach($data['eventHoster_details'] as $event_hoster_details): ?>
                        <td><?php echo $event_hoster_details->E_ID; ?></td>
                        <td> <img src="<?php echo URLROOT; ?>/public/img/admin/customer01.jpg"
                                style="hight:50px; width:50px; border-radius:50%;" alt="Profile Picture"></td>
                        <td><?php echo $event_hoster_details->E_Name; ?></td>
                        <td><a
                                href="<?php echo URLROOT; ?>/eventHosters/view_profile/<?php echo $event_hoster_details->E_ID; ?>"><button
                                    class="btn_1">View Profile</button></td></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

</html>