<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ================ Order Details List ================= -->
            <div class="details">
            <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>List of  Events</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Event ID</td>
                                <td>Event Name</td>
                                <td>Organization Name</td>
                                <td>Beneficiary Name</td>
                                <td>Date</td>
                                <td>Time</td>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <?php foreach($data['event_details'] as $event_details): ?>
                                <td><?php echo $event_details->Event_ID; ?></td>
                                <td><?php echo $event_details->Event_Name; ?></td>
                                <td><?php echo $event_details->E_Name; ?></td>
                                <td><?php echo $event_details->B_Name; ?></td>
                                <td><?php echo $event_details->Event_Date; ?></td>
                                <td><?php echo $event_details->Event_Time; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

     <!-- =========== Scripts =========  -->
     <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
    
</body>

</html>