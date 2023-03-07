
<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">
<body onload="initMap()">

<!--<div class="chartBox">-->
<!--  <canvas id="myChart"></canvas>-->
<!--</div>-->

<<<<<<< Updated upstream
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
                        <div class="chart" style="display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center">
                            <div class="chart1" style="width: 50%; display: flex; flex-direction: column">
                                <canvas id="myChart"></canvas>
                                <canvas id="myLine"></canvas>
                            </div>
                            <div class="chart2" style="width: 50%; display: flex; flex-direction: column">
                                <canvas id="myPie"></canvas>
                            </div>
                        </div>
                    </div>
                    </section>
                    <!--home section end-->

                    <script src="<?php echo URLROOT; ?>/js/sidebar.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('myChart');
                        const ctp = document.getElementById('myPie');
                        const ctr = document.getElementById('myLine');

                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'No. of Donations',
                                    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
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

                        new Chart(ctp, {
                            type: 'pie',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'No. of Donations',
                                    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
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

                        new Chart(ctr, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'No. of Donations',
                                    data: [12, 19, 3, 5, 2, 3, 5, 8, 10, 13, 2, 6],
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

                    </script>
                </div>


            </div>


=======
<div id="map" style="height: 500px; width: 100%;">

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBijs3YopDeNYhNj_8QSqo0Gh3-JoMU54&callback=Function.prototype"></script>
<script>
    function initMap() {
        var colombo = {lat: 6.9271, lng: 79.8612};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 50,
            center: colombo
        });
        var marker = new google.maps.Marker({
            position: colombo,
            map: map,
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function(event) {
            document.getElementById("latitude").value = event.latLng.lat();
            document.getElementById("longitude").value = event.latLng.lng();
        });
    }
</script>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>-->
<!---->
<!--<script>-->
<!--  const ctx = document.getElementById('myChart');-->
<!---->
<!--  new Chart(ctx, {-->
<!--    type: 'bar',-->
<!--    data: {-->
<!--      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],-->
<!--      datasets: [{-->
<!--        label: '# of Votes',-->
<!--        data: [20, 19, 3, 5, 2, 3],-->
<!--        borderWidth: 1-->
<!--      }]-->
<!--    },-->
<!--    options: {-->
<!--      scales: {-->
<!--        y: {-->
<!--          beginAtZero: true-->
<!--        }-->
<!--      }-->
<!--    }-->
<!--  });-->
<!--  -->
<!--</script>-->
>>>>>>> Stashed changes


<?php require APPROOT . '/views/inc/footer.php'; ?>