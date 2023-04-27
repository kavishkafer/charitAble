

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

        <!-- ======================= Cards ================== -->
<!--        <div class="cardBox">-->
<!--            <div class="card">-->
<!--                <div>-->
<!--                    <div class="numbers">50</div>-->
<!--                    <div class="cardName">Total Requests</div>-->
<!--                </div>-->
<!---->
<!--                <div class="iconBx">-->
<!--                    <ion-icon name="eye-outline"></ion-icon>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="card">-->
<!--                <div>-->
<!--                    <div class="numbers">10</div>-->
<!--                    <div class="cardName">Pending Requests</div>-->
<!--                </div>-->
<!---->
<!--                <div class="iconBx">-->
<!--                    <ion-icon name="cart-outline"></ion-icon>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="card">-->
<!--                <div>-->
<!--                    <div class="numbers">284</div>-->
<!--                    <div class="cardName">Accepted request</div>-->
<!--                </div>-->
<!---->
<!--                <div class="iconBx">-->
<!--                    <ion-icon name="chatbubbles-outline"></ion-icon>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="card">-->
<!--                <div>-->
<!--                    <div class="numbers">10</div>-->
<!--                    <div class="cardName">Completed Requests</div>-->
<!--                </div>-->
<!---->
<!--                <div class="iconBx">-->
<!--                    <ion-icon name="cash-outline"></ion-icon>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

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


                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var count;
                        var req;




                        const ctx = document.getElementById('myChart');
                        const ctp = document.getElementById('myPie');
                        const ctr = document.getElementById('myLine');
                        const ctd = document.getElementById('myDon');

                        // new Chart(ctd,{
                        //     type: 'doughnut',
                        //     data: {
                        //         labels: ['High', 'Normal'],
                        //         datasets: [{
                        //             label: 'No. of Requests',
                        //             data: [10, 10],
                        //             backgroundColor: [
                        //                 'rgba(255, 99, 132, 0.2)',
                        //                 'rgba(54, 162, 235, 0.2)',
                        //
                        //             ],
                        //             borderColor: [
                        //                 'rgba(255, 99, 132, 1)',
                        //                 'rgba(54, 162, 235, 1)',
                        //
                        //             ],
                        //             borderWidth: 1
                        //         }]
                        //     },
                        //     options: {
                        //         scales: {
                        //
                        //         }
                        //     }
                        // })
                        










                        new Chart(ctr, {
                            type: 'line',
                            data: {
                                labels: [count, 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'No. of Donations',
                                    data: [req, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
                                    borderWidth: 1
                                }]
                            },

                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                        function No_of_requests() {

                            $.ajax({
                                url: "http://localhost/charitAble/Stat_bens/donationViaMonths",
                                method: 'GET',
                                dataType: 'JSON',
                                success: function (response) {

                                    console.log(response);

                                    // setup block
                                    const data={

                                        labels: [response.jan,response.feb,response.mar,response.apr,response.may,response.jun,response.jul,response.aug,response.sep,response.oct,response.nov,response.dec],
                                        datasets: [{
                                            label: 'title',
                                            data: [response.janCount.num_rows,response.febCount.num_rows,response.marCount.num_rows,response.aprCount.num_rows,response.mayCount.num_rows,response.junCount.num_rows,response.julCount.num_rows,response.augCount.num_rows,response.sepCount.num_rows,response.octCount.num_rows,response.novCount.num_rows,response.decCount.num_rows],
                                            borderWidth: 2
                                        }]
                                    };
                                    //config block
                                    const config = {
                                        type: 'bar',
                                        data,
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    };
                                    //Render block
                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config

                                    );


                                }
                            })
                        }
                        No_of_requests();

                        function pieChart(){
                            $.ajax({
                                url: "http://localhost/charitAble/Stat_bens/requestStatus",

                                method: 'GET',
                                dataType: 'JSON',
                                success: function (response1) {
                                    count = response1.pending;
                                    req = response1.pendingCount;
                                    console.log(response1);
                                    //setup pie chart
                                    const data = {
                                        labels: [response1.pending, response1.accepted, response1.completed],
                                        datasets: [{
                                            label: 'No. of Donations',
                                            data: [response1.pendingCount, response1.acceptedCount, response1.completedCount],
                                            borderWidth: 1
                                        }]
                                    };
                                    //config pie chart
                                    const configPie = {
                                        type: 'pie',
                                        data: data,

                                        options: {
                                            scales: {
                                                // y: {
                                                //     beginAtZero: true
                                                // }
                                            }
                                        }
                                    };
                                    //render pie chart
                                    const myPie = new Chart(
                                        document.getElementById('myPie'),
                                        configPie
                                    );
                                }
                            })

                        }
                     pieChart();

                        function donutChart(){
                            $.ajax({
                                url: "http://localhost/charitAble/Stat_bens/priorityCount",


                                method: 'GET',
                                dataType: 'JSON',
                                success: function (response2) {
                                    // count = response2.high;
                                    // req = response2.highCount;
                                    console.log(response2);
                                    //setup pie chart
                                    const data = {
                                        labels: [response2.high, response2.normal],
                                        datasets: [{
                                            label: 'Donation Priority',
                                            data: [response2.highCount.num_rows, response2.normalCount.num_rows],
                                            borderWidth: 1
                                        }]
                                    };

                                    //config pie chart
                                    const configDonut = {
                                        type: 'doughnut',
                                        data: data,

                                        options: {
                                            scales: {
                                                // y: {
                                                //     beginAtZero: true
                                                // }
                                            }
                                        }
                                    };
                                    //render pie chart
                                    const myPie = new Chart(
                                        document.getElementById('myDon'),
                                        configDonut
                                    );
                                    console.log(response2);
                                }
                            })

                            }
                            donutChart();
                    </script>
                </div>


            </div>






<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>