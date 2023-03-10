<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                <a href="#"><button class="btn" >Request events</button></a>
                <a href="#"><button class="btn" >requsted Events list </button></a>
                <a href="#"><button class="btn" >Events' list</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                        <h2>List of event requests</h2> 
                     <table>
                        
                            <tr>
                                <th>Event ID</th>
                                <th>Event Name</th>
                                <th>Event Purpose</th>
                                <th>Event Date</th>
                                <th>Event Time</th>
                            </tr>

                         <tbody> 
                            <tr>
                                <?php foreach($data['request_details'] as $request_details): ?>
                                <td><?php echo $request_details->E_ID; ?></td>
                                <td><?php echo $request_details->E_Name; ?></td>
                                <td><?php echo $request_details->E_Purpose; ?></td>
                                <td><?php echo $request_details->E_Date; ?></td> 
                                <td><?php echo $request_details->E_Time; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/add_new_admin.js"></script>
</body>

</html>