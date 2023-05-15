<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/dashboard.css">

<body>


<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers"><?php echo $data['count'] ?></div>
            <div class="cardName">Total Event Requests</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $data['accept'] ?></div>
            <div class="cardName">Ongoing Event Requests</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
        </a>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $data['pending'] ?></div>
            <div class="cardName">Requests Under Review</div>
        </div>

        <div class="iconBx">
            <ion-icon name="cart-outline"></ion-icon>
        </div>
        </a>
    </div>

    <div class="card">
        <div>
            <div class="numbers"><?php echo $data['complete'] ?></div>
            <div class="cardName">Completed Events</div>
        </div>

        <div class="iconBx">
            <ion-icon name="chatbubbles-outline"></ion-icon>
        </div>
        </a>
    </div>


    <!--<div class="all-req">
    <h2>Recent Requests</h2>
    </div>

    <div class="new-select">
-->
    <!-- ================ Order Details List ================= -->

</div>

<div class="details">
    <div class="cardHeader">
        <a href="<?php echo URLROOT; ?>/request_ehs/reviewreq" class="btn">Requests Under Review</a>
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Ongoing Event Requests</h2>
        </div>

        <table>
            <thead>
            <tr>

                <td>Beneficiary</td>
                <td>Event Name</td>
                <td>Event Date</td>
             <!--   <td>Food Type</td>
                <td>Quantity</td>-->
                <td>Event Time</td>
                <td>View</td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requests'] as $requests): ?>
                <td><?php echo $requests->B_Name; ?></td>
                <td><?php echo $requests->Event_Name; ?></td>
                <td><?php echo $requests->Event_Date; ?></td>
               <!-- <td><?php echo $requests->Food_Type; ?></td>
                <td><?php echo $requests->Donation_Quantity; ?></td>-->
                <td ><?php echo $requests->Event_Time; ?></td>
                <td><a href="<?php echo URLROOT; ?>/request_ehs/show/<?php echo $requests->Event_ID; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>



<div class="details" >
    <div class="recentOrders" >
        <div class="cardHeader">
            <h2>Completed Events</h2>
        </div>

        <div class="recentOrders">

            <div class="cardHeader">
                <h3>Completed Requests</h3>
            </div>

            <table>
                <thead>
                <tr>
                    <td>Beneficiary</td>
                    <td>Event Name</td>
                    <td>Date</td>
                   <!-- <td>Food Type</td>
                    <td>Quantity</td>-->
                    <td>Event Description</td>
                    <td>Time</td>
                    <td>View</td>

                </tr>
                </thead>

                <tbody>

                <tr>

                    <?php foreach($data['requestscom'] as $requestscom): ?>
                    <td><?php echo $requestscom->B_Name; ?></td>
                    <td><?php echo $requestscom->Event_Name; ?></td>
                    <td><?php echo $requestscom->Event_Date; ?></td>
                  <td><?php echo $requestscom->Event_Description; ?></td>
                 <!--   <td><?php echo $requestscom->Donation_Quantity; ?></td>-->
                    <td ><?php echo $requestscom->Event_Time; ?></td>
                    <td><a href="<?php echo URLROOT; ?>/request_ehs/show/<?php echo $requestscom->Event_ID; ?>"?>view more</a></td>
                </tr>
                <?php endforeach; ?>


                </tbody>
            </table>
        </div>






    </div>
</div>

</div>
</div>
</body>

<?php require APPROOT . '/views/inc/footer.php'; ?>
