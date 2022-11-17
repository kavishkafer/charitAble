<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if(isset($_SESSION['user_id'])) : ?>
  <h3>Welcome <?php echo $_SESSION['user_name']; ?></h3>
  <p>You are logged in with  and your user id is  </p>
  <?php else : ?> not logged in
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>