


<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/profile/profileben.css">
<body >

        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                </div>

                <div class="container">

                    <h1 ><?php echo $data['requests']->B_Name; ?></h1>
                    <hr>
                    <h2 > <div class="data">
                            <?php echo $data['requests']->B_Description; ?>
                        </div>
                    </h2>
                    <div class="content-sidebar">

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                            </div>
                        </div>
                        <div class="data">
                        </div>

                        <div class="content">
                            <div class="des">
                                <h3> <label for="Email"><b>E-Mail</b></label></h3>
                            </div>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Email; ?>
                        </div>


                        <div class="content">
                            <label for="address"><h3>Address</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Address; ?>
                        </div>


                        <div class="content">
                            <label for="telephone_number"><h3>Telephone Number</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Tpno; ?>
                        </div>


                        <div class="content">
                            <label for="members"><h3>Members</h3></label>
                        </div>
                        <div class="data">
                            <?php echo $data['requests']->B_Members; ?>
                        </div>


<!--                        <div class="content">-->
<!--                            <label for="Registration Letter"><h3>Registration letter</h3></label>-->
<!--                        </div>-->
<!--                        <div class="data" >-->
<!--                            --><?php //echo $data['requests']->B_RegistrationLetter; ?>
<!--                        </div>-->

                        <div class="content">
                            <label for="address"><h3>Directions</h3></label>
                        </div>
                        <div class="data">
                            <button onclick="openGoogleMapsNavigation()">Open Navigation</button>
                            <div id="map" style="width:80%;height:500px; border-radius: 10px;">





                            </div>
                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCykzd2-mQTQdSMQNh8PxrWAnDBgqjf_Xg&callback=initMap" async defer></script>
                            <script>
                                function initMap() {
                                    var origin = { lat: <?php echo $data['donor']->latitude?>, lng: <?php echo $data['donor']->longitude?> }; // Latitude and longitude of the origin point
                                    var destination = { lat: <?php echo $data['user']->latitude?>, lng: <?php echo $data['user']->longitude?> }; // Latitude and longitude of the destination point

                                    var map = new google.maps.Map(document.getElementById('map'), {
                                        center: origin,
                                        zoom: 8
                                    });

                                    var directionsService = new google.maps.DirectionsService();
                                    var directionsRenderer = new google.maps.DirectionsRenderer({ map: map });

                                    var request = {
                                        origin: origin,
                                        destination: destination,
                                        travelMode: google.maps.TravelMode.DRIVING // You can set other travel modes like BICYCLING, TRANSIT, or WALKING
                                    };

                                    directionsService.route(request, function(result, status) {
                                        if (status == google.maps.DirectionsStatus.OK) {
                                            directionsRenderer.setDirections(result);

                                            // Add marker for the origin point
                                            new google.maps.Marker({
                                                position: origin,
                                                map: map,
                                                icon: {
                                                    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                                                }
                                            });

                                            // Add marker for the destination point
                                            new google.maps.Marker({
                                                position: destination,
                                                map: map,
                                                icon: {
                                                    url: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                                                }
                                            });

                                            // Adjust map bounds to zoom into the route
                                            var bounds = new google.maps.LatLngBounds();
                                            var route = result.routes[0];
                                            for (var i = 0; i < route.legs.length; i++) {
                                                bounds.extend(route.legs[i].start_location);
                                                bounds.extend(route.legs[i].end_location);
                                            }
                                            map.fitBounds(bounds);
                                        }
                                    });
                                }
                                function openGoogleMapsNavigation() {
                                    var origin = { lat: <?php echo $data['donor']->latitude?>, lng: <?php echo $data['donor']->longitude?> }; // Latitude and longitude of the origin point
                                    var destination = { lat: <?php echo $data['user']->latitude?>, lng: <?php echo $data['user']->longitude?> }; // Latitude and longitude of the destination point

                                    var url = 'https://www.google.com/maps/dir/?api=1';
                                    url += '&origin=' + origin.lat + ',' + origin.lng;
                                    url += '&destination=' + destination.lat + ',' + destination.lng;
                                    url += '&travelmode=driving'; // You can set other travel modes like biking, transit, or walking

                                    window.open(url);
                                }
                            </script>


                        </div>
                         </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
