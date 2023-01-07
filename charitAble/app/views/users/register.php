 

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Responsive Registration Form</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style_2.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="<?php echo URLROOT; ?>/users/register" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="Fullname"
                    name="name"
                    placeholder="Enter Name"
                    value="<?php echo $data['name'] ?>"
                    class="<?php echo (!empty($data['name_err']))  ? "invalid" : '' ; ?>" />
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"
                    value="<?php echo $data['email'] ?>"
                    class="<?php echo (!empty($data['email_err']))  ? "invalid" : '' ; ?>" />
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
        
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"
                    value="<?php echo $data['password'] ?>"
                    class="<?php echo (!empty($data['password_err']))  ? "invalid" : '' ; ?>" />
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="confirm_password"
                    placeholder="Confirm Password"
                    value="<?php echo $data['confirm_password'] ?>"
                    class="<?php echo (!empty($data['confirm_password_err']))  ? "invalid" : '' ; ?>" />
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
          </div>
    
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
