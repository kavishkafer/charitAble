
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/public/css/style_1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b85f2cc4e1.js"></script>
    <title>Admin Login Form</title> 
</head>
<body>
    <div class="container">
        <div class="shape">
            <div class="img">
                <img src="<?php echo URLROOT; ?>/public/img/login.svg">
            </div>
        </div>
        <div class="login-container">   
            <form action="<?php echo URLROOT; ?>/users/login" method="POST" autocomplete="off">
                <img class="avatar" src="<?php echo URLROOT; ?>/public/img/avatar.svg">
                <h2>Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class=>
                        <h5>Email</h5>
                        <input 
                        type="text" 
                        name="admin_email"
                        value="<?php echo $data['admin_email'] ?>"
                        class= "input <?php echo (!empty($data['admin_email_err']))  ? "invalid" : '' ; ?>" /> 
                    <span class="invalid-feedback"><?php echo $data['admin_email_err']; ?></span> 
                    </div>
                </div>

                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input 
                        type="password" 
                        name="admin_password" 
                        value="<?php echo $data['admin_password'] ?>" 
                        class="input <?php echo (!empty($data['admin_password_err']))  ? "invalid" : '' ; ?>" />
                     <span class="invalid-feedback"><?php echo $data['admin_password_err']; ?></span> 
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/main.js"></script>
</body>
</html>

<?php require APPROOT . '/views/inc/footer.php'; ?>
