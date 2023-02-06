<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/event_hoster/login.css">
<body>

    <div class="container">

        <div class="login-left">
        <img src="<?php echo URLROOT; ?>/img/eh_login.svg" alt="login">
        </div>

        <div class="login-right">
            <div class="login-header">
            <?php flash('register_success'); ?>
                <h1>Log in</h1>

                
                

                <p> <a href="<?php echo URLROOT; ?>/users/signup_eh"> Don't have an account? Sign up</a></p>
            </div>
            <form class="login-form" action="<?php echo URLROOT; ?>/users/login_ben"  method="POST">
                <div class="login-form-content">
                    <div class="form-item">
                        <label for="emailForm">Email</label>
                        <input type="text" name="email" id="emailForm" placeholder="Enter your email" class="input" value="<?php echo $data['email']; ?>">
                        <div class=warn><?php echo $data['email_err']; ?></div>

                    </div>
                    <div class="form-item">
                        <label for="passwordForm">Password</label>
                        <input name="password" id="passwordForm" placeholder="Enter your password" type="password" class="input"  value="<?php echo $data['password']; ?>">
                        <div class=warn><?php echo $data['password_err']; ?></div>
                    </div>
                    <div class="form-item">
                        <a href="#">
                            <p class="forgot-password">Forgot password?</p>
                            </a>
                        
                    </div>
                    
                    <button type="submit" value="Login">Log in</button>
                </div>
                
            </form>
        </div>
        
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>
</body>