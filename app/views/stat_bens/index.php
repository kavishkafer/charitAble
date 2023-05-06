

<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">







        <!-- ================ Order Details List ================= -->

                    <div class="details">
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