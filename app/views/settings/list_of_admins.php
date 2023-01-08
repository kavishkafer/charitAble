<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                <a href="<?php echo URLROOT; ?>/settings/add_new_admin"><button class="btn">Add new admin</button></a>
                <a href="<?php echo URLROOT; ?>/settings/update_profile"><button class="btn">Update Profile</button></a>
                <a href="<?php echo URLROOT; ?>/settings/list_of_admins"><button class="btn active">List of admins</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                        <h2>List of admins</h2> 
                     <table>
                        
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</tn>
                                <th>Phone Number</th>
                                <th>NIC</th>
                                <th>Date Assigned</th>
                            </tr>

                         <tbody> 
                            <tr>
                                <?php foreach($data['admin_details'] as $admin_details): ?>
                                <td><?php echo $admin_details->admin_id; ?></td>
                                <td><?php echo $admin_details->admin_name; ?></td>
                                <td><?php echo $admin_details->admin_email; ?></td>
                                <td><?php echo $admin_details->admin_phone; ?></td> 
                                <td><?php echo $admin_details->admin_nic; ?></td>
                                <td><?php echo $admin_details->admin_date_assigned; ?></td>
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