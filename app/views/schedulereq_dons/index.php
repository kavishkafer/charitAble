<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<!--<link rel="stylesheet" href="<?php /*echo URLROOT; */?>/css/donor/dashboard.css" xmlns="http://www.w3.org/1999/html">
-->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/schedulereq.css">
<main>
<div class="details">
    <div class="cardHeader">
    </div>
    <div class="recentOrders">
        <div class="cardHeader">
            <h1>Choose A Beneficiary</h1>
        </div>

        <table>
            <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Address</td>
                <td>Telephone No</td>
                <td>E-mail</td>
                <td style="text-align: left">Quantity</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
    
        <tbody>
            <tr>

                <?php foreach ($data['names'] as $name): ?>
                <td> <?php echo $name->B_Id; ?></td>
                <td><?php echo $name->B_Name; ?></td>
                <td><?php echo $name->B_Address; ?></td>
                <td><?php echo $name->B_Tpno; ?></td>
                <td><?php echo $name->B_Email; ?></td>
                <td><?php echo $name->B_Members; ?></td>
                <td style="text-align: right"><a href="<?php echo URLROOT; ?>/schedulereq_dons/add/<?php echo $name->B_Id; ?>"
                       >Select</a></td>
                <td><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $name->B_Id; ?>" >View
                        Profile</a></td>

            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</main>
</div>
</div>





    <script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>

