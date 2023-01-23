<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>


<body>
  <main>
<div class="container">
<div class="calender-container">
  <div class="calendar">
<img src="../public/img/img_dons/calendar.jpg" alt="logo">
  </div>
</div>
<div class="form-container-req">
<div class="form-inner">
<form action="<?php echo URLROOT; ?>/schedulereq_dons/add" autocomplete="off" method="POST">
<div class="heading-req">
<h2>RESERVE A MEAL</h2>
</div>

<div class="form">
<div class="input">
<input type="text" name="name"  minlength="4" class="input-field-req" value = "<?php echo $data['name']; ?>" autocomplete="off"/>
<label>Name</label>
<div class="warn"><?php echo $data['name_err']; ?></div>
</div>

<div class="input">
<input type="text" name="tel_no" minlength="4" class="input-field-req" value = "<?php echo $data['tel_no']; ?>" autocomplete="off"/>
<label>Telephone Number</label>
<div class="warn"><?php echo $data['tel_no_err']; ?></div>
</div>

<div class="input">
<input type="text" name="address" minlength="4" class="input-field-req" value = "<?php echo $data['address']; ?>" autocomplete="off"/>
<label>Address</label>
<div class="warn"><?php echo $data['address_err']; ?></div>
</div>

<div class="input">
<input type="text" name="food_type" minlength="4" class="input-field-req" value = "<?php echo $data['food_type']; ?>" autocomplete="off"/>
<label>Food Type</label>
<div class="warn"><?php echo $data['food_type_err']; ?></div>
</div>

<div class="input">
<label>Date</label>
<input type="date" name="date" minlength="4" class="input-field-req" value = "<?php echo $data['date']; ?>" autocomplete="off" />
<div class="warn"><?php echo $data['date_err']; ?></div>
</div>

<div class="input">
<label>Time</label><br>
<select class="dropdown" name="time">
  <option value="breakfast">Breakfast</option>
  <option value="lunch">Lunch</option>
  <option value="dinner">Dinner</option>
  </select>
<div class="warn"><?php echo $data['time_err']; ?></div>
</div>

<input type="submit" value="Submit" class="btn">

</div>

</form>
</div>

</div>
</div>
</main>

<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>