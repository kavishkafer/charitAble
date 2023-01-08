<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/list_of_admins.css">

        
<!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>

            <!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <a href="<?php echo URLROOT; ?>/eventHosters/registration_requests"><button class="btn active" >Registration Requests</button></a>
                <a href="<?php echo URLROOT; ?>/eventHosters/list_of_eventHosters"><button class="btn" >List of Event Hosters</button></a>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                        <!-- <h2>Registration requests</h2>  -->
                     <table>
                       
                            <tr>
                                <th>ID</th>
                                <th>Event Hoster Name</th>
                                <th>Registration Number</th>
                                <th>Email</th>
                                <th>TP</th>
                                <th></th>
                            </tr>
                       
                         <tbody> 
                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>

                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>

                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>

                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>


                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>

                            <tr>
                                <td>001</td>
                                <td>AAAAAAAA</td>
                                <td>223301</td>
                                <td>qwert123@gmail.com</td>
                                <td>07734524516</td>
                                <td><a href="#"><button class="btn_1">View Request</button></td>
                            </tr>

                        </tbody>
                    </table> 
                </div>
            </div>
        </div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>

    
</body>

</html>