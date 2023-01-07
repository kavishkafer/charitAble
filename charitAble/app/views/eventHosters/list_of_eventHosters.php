<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/eventHosters/registration_requests"><button class="btn" >Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters"><button class="btn active" >List of Event Hosters</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <h2>List of Event Hosters</h2>
                        <!-- <h2>Registration requests</h2>  -->
                     <table>
                        <tr>
                            <th>Event Hoster ID</th>
                            <th>Event Hoster Name</th>
                            <th>Email</th>
                            <th>TP</th>
                            <th></th>
                        </tr>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['eventHoster_details'] as $eventHoster_details): ?>
                                <td><?php echo $eventHoster_details->eventHoster_id; ?></td>
                                <td><?php echo $eventHoster_details->eventHoster_name; ?></td>
                                <td><?php echo $eventHoster_details->eventHoster_email; ?></td>
                                <td><?php echo $eventHoster_details->eventHoster_phone; ?></td>
                                <td><a href="#"><button class="btn_1">View Profile</button></td></a></td>
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