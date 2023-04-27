<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<body>

<div class="container">

    <div class="choose-ben">
        <h2>Choose A Beneficiary</h2>
    </div>

    <div class="city">
        <!--<select class="select2" name="city">
            <option value="breakfast">Colombo</option>
            <option value="lunch">Gampaha</option>
            <option value="dinner">Kandy</option>
        </select>-->
    </div>

    <div class="select">
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone No</th>
                <th>E-mail</th>
                <th>Quantity</th>
                <th></th>
                <th></th>
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
                <td><a href="<?php echo URLROOT; ?>/schedulereq_dons/add/<?php echo $name->B_Id; ?>"
                       class="btn2">Select</a></td>
                <td><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $name->B_Id; ?>" class="btn2">View
                        Profile</a></td>

            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

