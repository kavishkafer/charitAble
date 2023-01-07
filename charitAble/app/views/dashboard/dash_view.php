<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/dashboard.css">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <?php require APPROOT . '/views/inc/topbar.php'; ?>
            
            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Donors</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Beneficiaries</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Event Hosters</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">842</div>
                        <div class="cardName">Posts</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Donations</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Donation ID</td>
                                <td>Donor Name</td>
                                <td>Beneficiary Name</td>
                                <td>Donation Type</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>Nishan Madhushanka</td>
                                <td>Suwa sahana</td>
                                <td>Education</td>
                                <td><span class="status delivered">Completed</span></td>
                            </tr>

                            <tr>
                                <td>002</td>
                                <td>Kavishka Fernando</td>
                                <td>Aruna</td>
                                <td>Education</td>
                                <td><span class="status pending">Pending</span></td>
                            </tr>

                            <tr>
                                <td>003</td>
                                <td>Amasha Wijesinghe</td>
                                <td>Kumudu</td>
                                <td>Education</td>
                                <td><span class="status return">Uncompleted</span></td>
                            </tr>

                            <tr>
                                <td>004</td>
                                <td>Ishini Avindya</td>
                                <td>Kamal</td>
                                <td>Education</td>
                                <td><span class="status delivered">Completed</span></td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Events</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Event ID</td>
                                <td>Organization Name</td>
                                <td>Beneficiary Name</td>
                                <td>Event Name</td>
                                <td>Date & Time</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>001</td>
                                <td>ABC Holdings</td>
                                <td>Suwa Sahana</td>
                                <td>Pehesara</td>
                                <td>13/12/2022 10:00<td>
                                
                            </tr>

                            <tr>
                                <td>002</td>
                                <td>ABC Holdings</td>
                                <td>Suwa Sahana</td>
                                <td>Pehesara</td>
                                <td>13/12/2022 10:00<td>
                            </tr>

                            <tr>
                                <td>003</td>
                                <td>ABC Holdings</td>
                                <td>Suwa Sahana</td>
                                <td>Pehesara</td>
                                <td>13/12/2022 10:00<td>
                            </tr>

                            <tr>
                                <td>004</td>
                                <td>ABC Holdings</td>
                                <td>Suwa Sahana</td>
                                <td>Pehesara</td>
                                <td>13/12/2022 10:00<td>
                            </tr>

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