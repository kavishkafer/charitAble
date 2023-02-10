
<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/benificiary/ben_stat.css">
<<<<<<< Updated upstream

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
=======
<body onload="initMap()">

<!--<div class="chartBox">-->
<!--  <canvas id="myChart"></canvas>-->
<!--</div>-->

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