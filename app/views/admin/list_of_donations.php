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
                        <h2>List of Donations</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
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

                            <tr>
                                <td>004</td>
                                <td>Ishini Avindya</td>
                                <td>Kamal</td>
                                <td>Education</td>
                                <td><span class="status delivered">Completed</span></td>
                            </tr>

                            <tr>
                                <td>004</td>
                                <td>Ishini Avindya</td>
                                <td>Kamal</td>
                                <td>Education</td>
                                <td><span class="status delivered">Completed</span></td>
                            </tr>

                            <tr>
                                <td>004</td>
                                <td>Ishini Avindya</td>
                                <td>Kamal</td>
                                <td>Education</td>
                                <td><span class="status delivered">Completed</span></td>
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
            </div>
        </div>
    </div>

     <!-- =========== Scripts =========  -->
     <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
    
</body>

</html>