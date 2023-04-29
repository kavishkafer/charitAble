

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">




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

       

        <!-- ================ Order Details List ================= -->

                    <div class="main-container">
                        <div class="chart" style="display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center ">
                            <div class="chart1" style="width: 50%; display: flex; flex-direction: column; margin-left: 20px">
                                <canvas id="myChart"></canvas>
                                <canvas id="myLine"></canvas>
                            </div>
                            <div class="chart2" style="width: 25%; display: flex; flex-direction: column; margin-left: 40px;">
                                <canvas id="myPie"></canvas>
                                <canvas id="myDon" ></canvas>
                            </div>
<!--                            <div class="chart2"  >-->
<!--                               -->
<!--                            </div>-->
                        </div>
                    </div>
                    </section>
                    <!--home section end-->




                </div>


            </div>





<script src="<?php echo URLROOT; ?>/js/beneficiary/statben.js"></script>
<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>