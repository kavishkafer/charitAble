<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/donor/dashboard.css">

<body>


<!-- ======================= Cards ================== -->
<div class="cardBox">
    <div class="card">
        <div>
            <div class="numbers"><?php echo $data['count'] ?></div>
            <div class="cardName">Total Requests</div>
        </div>

        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $data['accept'] ?></div>
                        <div class="cardName">Ongoing Requests</div>
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
                        <div class="cardName">Completed Donations</div>
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
        <a href="<?php echo URLROOT; ?>/schedulereq_dons/reviewreq" class="btn">Requests Under Review</a>
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Ongoing Scheduled Requests</h2>
        </div>

        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Beneficiary</td>
                <td>Date</td>
                <td>Food Type</td>
                <td>Quantity</td>
                <td>Time</td>
                <td>View</td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requests'] as $requests): ?>
                <td> <?php echo $requests->B_Req_ID; ?></td>
                <td><?php echo $requests->B_Name; ?></td>
                <td><?php echo $requests->D_Date; ?></td>
                <td><?php echo $requests->Food_Type; ?></td>
                <td><?php echo $requests->Donation_Quantity; ?></td>
                <td ><?php echo $requests->Time; ?></td>
                <td><a href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $requests->B_Req_ID; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>

<div class="details">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Ongoing Beneficiary Requests</h2>
            <!--                <a href="<?php /*echo URLROOT; */?>/request_bens/add" class="btn">Add requests</a>
-->            </div>
        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Beneficiary</td>
                <td>Donation Type</td>
                <td>Donation Discription</td>
                <td>Quantity</td>
                <td>View</td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requestsben'] as $requestsben): ?>
                <td> <?php echo $requestsben->Donation_ID; ?></td>
                <td><?php echo $requestsben->B_Name; ?></td>
                <td><?php echo $requestsben->Donation_Type; ?></td>
                <td><?php echo $requestsben->Donation_Description; ?></td>
                <td><?php echo $requestsben->Donation_Quantity; ?></td>
                <td><a href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $requests->B_Req_ID; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>

    </div>
</div>

<div class="details" >
    <div class="recentOrders" >
        <div class="cardHeader">
            <h2>Completed Donations</h2>
        </div>

        <div class="recentOrders-new">

        <div class="cardHeader">
            <h3>Scheduled Requests</h3>
        </div>

        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Beneficiary</td>
                <td>Date</td>
                <td>Food Type</td>
                <td>Quantity</td>
                <td>Time</td>
                <td>View</td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requestscom'] as $requestscom): ?>
                <td> <?php echo $requestscom->B_Req_ID; ?></td>
                <td><?php echo $requestscom->B_Name; ?></td>
                <td><?php echo $requestscom->D_Date; ?></td>
                <td><?php echo $requestscom->Food_Type; ?></td>
                <td><?php echo $requestscom->Donation_Quantity; ?></td>
                <td ><?php echo $requestscom->Time; ?></td>
                <td><a href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $requests->B_Req_ID; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>
        </div>

        <div class="recentOrders-new">
        <div class="cardHeader">
            <h3>Beneficiary Requests</h3>
        </div>

        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Beneficiary</td>
                <td>Donation Type</td>
                <td>Donation Discription</td>
                <td>Quantity</td>
                <td>View</td>

            </tr>
            </thead>

            <tbody>

            <tr>

                <?php foreach($data['requestscomben'] as $requestscomben): ?>
                <td> <?php echo $requestscomben->Donation_ID; ?></td>
                <td><?php echo $requestscomben->B_Name; ?></td>
                <td><?php echo $requestscomben->Donation_Type; ?></td>
                <td><?php echo $requestscomben->Donation_Description; ?></td>
                <td><?php echo $requestscomben->Donation_Quantity; ?></td>
                <td><a href="<?php echo URLROOT; ?>/request_bens/show/<?php echo $requests->B_Req_ID; ?>"?>view more</a></td>
            </tr>
            <?php endforeach; ?>


            </tbody>
        </table>

        </div>
    </div>
</div>

</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
