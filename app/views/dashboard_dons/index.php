<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/donor/style.css">

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
                <a href="<?php echo URLROOT; ?>/requests_dons/index">
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
                <a href="<?php echo URLROOT; ?>/schedulereq_dons/reviewreq">
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
            </div>
            
            <div class="all-req">
            <h2>Recent Requests</h2> 
            </div>

            <div class="new-select">

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone No</th>
                <th>E-mail</th>
                <th>Quantity</th>
                <th ></th>
                <th ></th>


                


            </tr>
        </thead>
    
        <tbody>
            <tr>
        <td> 1</td> 
        <td>ABCD</td>
        <td>Colombo</td>
        <td>0116543689</td>
        <td>ABCD@gmail.com</td>
        <td>30</td>
        <td ><a href="#"  class="btn2">Select</a></td>

         </tr>

         <tr>
        <td> 2</td> 
        <td>ABCD</td>
        <td>Colombo</td>
        <td>0116543689</td>
        <td>ABCD@gmail.com</td>
        <td>20</td>
        <td ><a href="<?php echo URLROOT; ?>"  class="btn2">Select</a></td>

         </tr>

    </tbody>
    </table>
    
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
