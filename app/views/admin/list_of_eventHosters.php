<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <!-- <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/eventHosters/registration_requests"><button class="btn">Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters"><button class="btn active">Event Hosters' List</button></a>
            </div> -->
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Event Hosters' List</h2>
                    </div>

                     <table>
                        <thead>
                            <tr>
                                <td>Event Hoster ID</th>
                                <td>Event Hoster Name</td>
                                <td>Email</td>
                                <td>TP</td>
                                <td>Address</td>
                                <td></td>
                            </tr>
                        </thead>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['eventHoster_details'] as $event_hoster_details): ?>
                                <td><?php echo $event_hoster_details->E_ID; ?></td>
                                <td><?php echo $event_hoster_details->E_Name; ?></td>
                                <td><?php echo $event_hoster_details->E_Email; ?></td>

                                <td><?php echo $event_hoster_details->E_Tpno; ?></td>

                                <td><?php echo $event_hoster_details->E_Address; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/eventHosters/view_profile/<?php echo $event_hoster_details->E_ID; ?>"><button class="btn_1">View Profile</button></td></a></td>
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
    <script src='<?php echo URLROOT; ?>/public/admin/js/searchEventHosters.js'></script>
    
</body>

</html>