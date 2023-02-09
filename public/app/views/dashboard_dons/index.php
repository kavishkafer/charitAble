<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?> /css/donor/style.css">

<body>
<!-- ======================= Cards ================== -->
<div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">01</div>
                        <div class="cardName">Ongoing Requests</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                <a href="<?php echo URLROOT; ?>/schedulereq_dons/reviewreq">
                    <div>
                        <div class="numbers">01</div>
                        <div class="cardName">Requests Under Review</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </a>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">05</div>
                        <div class="cardName">Completed Donations</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

            </div> 

<?php require APPROOT . '/views/inc/footer.php'; ?>
