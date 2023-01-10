<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">

<body>
<div class="container">

        <div class="signup-left">
            <img src="../images/EH-signup.svg" alt="image">
        </div>

        <div class="signup-right">
            <div class="signup-header">
                <h1>Create an account</h1>
                <a href="../login/index.html"> <p>Already have an account? Log in</p></a>
            </div>
            <form action="<?php echo URLROOT; ?>/users/signup_eh" method="post" class="signup-form" autocomplete="off">
                <div class="signup-form-content">
                    <div class="form-item">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="name" value="<?php echo $data['name']; ?>" placeholder="Organization name">
                        <div class=warn><?php echo $data['name_err']; ?></div>
                    </div>
                    <div class="form-item">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="<?php echo $data['email']; ?>" placeholder="Email">
                        <div class=warn><?php echo $data['email_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="address">Address</label>
                        <input type="text" id="address" value="<?php echo $data['address']; ?>" placeholder="Address">
                        <div class=warn><?php echo $data['address_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="telephone_number">Telephone number</label>
                        <input type="tel" id="telephone_number" value="<?php echo $data['telephone_number']; ?>" placeholder="Telephone number">
                        <div class=warn><?php echo $data['telephone_number_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="password">Create Password</label>
                        <input type="password" id="password" value="<?php echo $data['password']; ?>" placeholder="Create password">
                        <div class=warn><?php echo $data['password_err']; ?></div>
                    </div>
                    <div class="form-item">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" value="<?php echo $data['confirm_password']; ?>" placeholder="Create password">
                        <div class=warn><?php echo $data['confirm_password_err']; ?></div>
                    </div>
                    
                    </div>
                    <button type="submit" value="signup_eh">Sign up</button>
                </div>
                
            </form>
        </div>
        
    </div>
    
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>