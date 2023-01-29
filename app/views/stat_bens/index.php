
<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">

<div class="chartBox">
  <canvas id="myChart"></canvas>
</div>
<?php echo $data['donation_quantity'];?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [<?php echo $data['donation_quantity']->donation_quantity;?>, 19, 3, 5, 2, 3],
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


<?php require APPROOT . '/views/inc/footer.php'; ?>