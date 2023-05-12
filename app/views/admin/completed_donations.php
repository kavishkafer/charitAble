<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">


<!-- ========================= Main ==================== -->
<div class="main">
    <?php require APPROOT . '/views/inc/topbar.php'; ?>
    <!-- ================ Order Details List ================= -->
    <div class="details">



        <div class="recentOrders">
            <h2>Completed Donations</h2>
            <div class="chartCard">
                <div class="chartBox">
                    <input type="date" onchange="startDateFilter(this)" value="
         2023-01-01" min="2023-01-01" max="2023-12-31">
                    <input type="date" onchange="endDateFilter(this)" value="
         2023-12-31" min="2023-01-01" max="2023-12-31">
                </div>
            </div>
            <div class="chart" style="display: flex; flex-direction: row; flex-wrap: nowrap; align-items: center">
                <div class="chart1" style="width: 100%; display: flex; flex-direction: column">
                    <canvas id="myChart"></canvas>
                <button onclick="generatePDF()">Generate PDF</button>
                </div>
            </div>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
            <script
                src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
            </script>

            <script>
            const ctx = document.getElementById('myChart');

            function No_of_donations() {
                const dateArrayJS = <?php echo json_encode($dateArray); ?>;
                //console.log(dateArrayJS)

                const dateChartJS = dateArrayJS.map((day, index) => {
                    let dayjs = new Date(day);
                    return dayjs.setHours(0, 0, 0, 0);
                });
                // setup 
                const data = {
                    labels: dateChartJS,
                    datasets: [{
                        label: 'Weekly Sales',
                        data: <?php echo json_encode($data->donationArray); ?>,
                        backgroundColor: [
                            'rgba(255, 26, 104, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 26, 104, 1)',
                        ],
                        borderWidth: 1
                    }]
                };

                // config 
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        scales: {
                            x: {
                                min: '2023-01-01',
                                max: '2025-12-31',
                                type: 'time',
                                time: {
                                    unit: 'day'
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                // render init block
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );

                function startDateFilter(date) {
                    const startDate = new Date(date.value);
                    console.log(startDate.setHours(0, 0, 0, 0));
                    myChart.config.options.scales.x.min = startDate.setHours(0, 0, 0, 0);
                    myChart.update();
                }

                function endDateFilter(date) {
                    const endDate = new Date(date.value);
                    console.log(endDate.setHours(0, 0, 0, 0));
                    myChart.config.options.scales.x.max = endDate.setHours(0, 0, 0, 0);
                    myChart.update();
                }

            }

            No_of_donations();

            function generatePDF() {
                const canvas = document.getElementById('myChart')
                const canvasImage = canvas.toDataURL('image/jpeg', 1.0)
                let pdf = new jsPDF()
                pdf.setFontSize(20)
                pdf.addImage(canvasImage, 'JPEG', 15, 15, 185, 150)
                pdf.save("myChart.pdf")
            }
            </script>
        </div>
    </div>
</div>

</body>



</html>