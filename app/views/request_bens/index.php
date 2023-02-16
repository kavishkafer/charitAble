

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_dashboard.css">
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/img/logo_white.png">
                        </span>
                         <span class="title"></span> 
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/request_bens/index">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/request_bens/requests">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="title">Requests</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/stat_bens">
                        <span class="icon">
                            <i class="fas fa-comment"></i>
                        </span>
                        <span class="title">Stats</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Calender</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_id'])) : ?>

                <li>
                    <a href="<?php echo URLROOT;?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>

               
                <!-- <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div> -->
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $data['count'] ?></div>
                        <div class="cardName">Total Requests</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $data['pending'] ?></div>
                        <div class="cardName">Pending Requests</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $data['accept'] ?></div>
                        <div class="cardName">Accepted request</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $data['complete'] ?></div>
                        <div class="cardName">Completed Requests</div>
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
                        <h2>Recent Requests</h2>
                        <a href="<?php echo URLROOT; ?>/request_bens/add" class="btn">Add requests</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Request_Id</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td>Quantity</td>
                                <td>Priority</td>
                                <td>View</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                            <tr>
                              
                            <?php foreach($data['requests'] as $requests): ?>
                                <td> <?php echo $requests->Donation_ID; ?></td> 
                                <td><?php echo $requests->Donation_Description; ?></td>
                                <td><?php echo $requests->Donation_Type; ?></td>
                                <td><?php echo $requests->Donation_Quantity; ?></td>
                                <td style="justify-content: center;"><?php echo $requests->Donation_Priority; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $requests->Donation_ID; ?>"?>view more</a></td>
                            </tr>
                            <?php endforeach; ?>
                            
                          
                        </tbody>
                    </table>
                </div>

                <!-- ================= New Customers ================ -->
                <!-- <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Recent Customers</h2>
                    </div>

                    <table>
                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer01.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>David <br> <span>Italy</span></h4>
                            </td>
                        </tr>

                        <tr>
                            <td width="60px">
                                <div class="imgBx"><img src="assets/imgs/customer02.jpg" alt=""></div>
                            </td>
                            <td>
                                <h4>Amit <br> <span>India</span></h4>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
    </div>

    

 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>