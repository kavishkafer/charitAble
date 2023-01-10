<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<body>
<link rel="stylesheet" href="/css/donor/style.css">


<?php flash('post_message'); ?>

<div class="choose-ben">
   <h2>Choose A Beneficiary</h2> 
</div>

<div class="city">
<select class="select2"  name="city">
  <option value="breakfast">Colombo</option>
  <option value="lunch">Gampaha</option>
  <option value="dinner">Kandy</option>
  </select>
</div>

<div class="select">
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Address</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
    
        <tbody>
            <tr>
                <td>1</td>
                <td>ABCD</td>
                <td>Colombo</td>
                <td></td>
                <td></td>
    <td><a href="<?php echo URLROOT; ?>/schedulereq_dons/add" class="btn">Select</a></td>
    <td><a href="#" class="btn">View Profile</a></td>

    </tr>

    <tr>
                <td>2</td>
                <td>ABCD</td>
                <td>Colombo</td>
                <td></td>
                <td></td>
    <td><a href="<?php echo URLROOT; ?>/schedulereq_dons/add" class="btn">Select</a></td>
    <td><a href="#" class="btn">View Profile</a></td>

    </tr>

    <tr>
                <td>3</td>
                <td>ABCD</td>
                <td>Colombo</td>
                <td></td>
                <td></td>
    <td><a href="<?php echo URLROOT; ?>/schedulereq_dons/add" class="btn">Select</a></td>
    <td><a href="#" class="btn">View Profile</a></td>

    </tr>
    </tbody>
    </table>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>

