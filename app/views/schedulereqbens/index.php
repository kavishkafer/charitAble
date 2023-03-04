

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_accept.css">
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
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="#">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                    <span class="title">Requests</span>
                </a>
            </li>

            <li>
                <a href="#">
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

            <li>
                <a href="<?php echo URLROOT;?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                    <span class="title">Logout</span>
                </a>
            </li>


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
        <!-- <div class="cardBox">
             <div class="card">
                 <div>
                     <div class="numbers">1,504</div>
                     <div class="cardName">Total Requests</div>
                 </div>

                 <div class="iconBx">
                     <ion-icon name="eye-outline"></ion-icon>
                 </div>
             </div>

             <div class="card">
                 <div>
                     <div class="numbers">80</div>
                     <div class="cardName">Pending Requests</div>
                 </div>

                 <div class="iconBx">
                     <ion-icon name="cart-outline"></ion-icon>
                 </div>
             </div>

             <div class="card">
                 <div>
                     <div class="numbers">284</div>
                     <div class="cardName">Accepted request</div>
                 </div>

                 <div class="iconBx">
                     <ion-icon name="chatbubbles-outline"></ion-icon>
                 </div>
             </div>

             <div class="card">
                 <div>
                     <div class="numbers">10</div>
                     <div class="cardName">Completed Requests</div>
                 </div>

                 <div class="iconBx">
                     <ion-icon name="cash-outline"></ion-icon>
                 </div>
             </div>
         </div>-->

        <!-- ================ Order Details List ================= -->
        <div class="calender-container">
            <div class="calendar">
                <div id="calendar"></div>
            </div>
        </div>
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Requests</h2>
                </div>

                <table>
                    <thead>
                    <tr>
                        <td>Request_Id</td>
                        <td>Donor Name</td>
                        <td>Date</td>
                        <td>Time</td>
                        <td>Quantity</td>
                        <td></td>

                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <?php foreach($data['requests'] as $requests): ?>
                        <td> <?php echo $requests->B_Req_ID; ?></td>
                        <td><?php echo $requests->D_Name; ?></td>
                        <td><?php echo $requests->D_Date; ?></td>
                        <td><?php echo $requests->Time; ?></td>
                        <td><?php echo $requests->Donation_Quantity; ?></td>
                        <td ><a href="<?php echo URLROOT; ?>/schedulereqbens/show/<?php echo $requests->B_Req_ID;?>">View More</a></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>