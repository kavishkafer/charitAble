<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/event_hoster/signup.css">
<body>

    <div class="container">

        <div class="signup-left">
        <img src="<?php echo URLROOT; ?>/img/eh_signup.svg" alt="signup">
        </div>

        <div class="signup-right">
            <div class="signup-header">
                <h1>Create an account</h1>
                <a href="<?php echo URLROOT; ?>/users/login_eh">  <p>Already have an account? Log in</p></a>
            </div>
            
            <form action="<?php echo URLROOT; ?>/users/signup_eh" method="POST" class="signup-form">
                <div class="signup-form-content">
                    <div class="form-item">
                        <label for="NameForm">Name</label>
                        <input type="text" id="nameForm" placeholder="Organization name" class="input" value="<?php echo $data['name']; ?>">
                        <div class=warn><?php echo $data['name_err']; ?></div>
                    </div>
                    <div class="form-item">
                        <label for="emailForm">Email</label>
                        <input type="email" id="email" placeholder="Email" class="input"  value="<?php echo $data['email']; ?>">
                        <div class=warn><?php echo $data['email_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="addressForm">Address</label>
                        <input type="text" id="address" placeholder="Enter your address" class="input"  value="<?php echo $data['address'];?>">
                            <div class=warn><?php echo $data['address_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="telephoneForm">Telephone number</label>
                        <input type="tel" name="telephone_number" pattern="[0-9]{10}" class="input" placeholder="Telephone Number" value="<?php echo $data['telephone_number'];?>">
                        <div class=warn><?php echo $data['telephone_number_err']; ?></div>
                    </div>

                    <div class="form-item">
                        <label for="passwordForm">Create Password</label>
                        <input type="password" id="passwordForm" placeholder="Create password" class="input" value="<?php echo $data['password'];?>" >
                                <div class=warn><?php echo $data['password_err']; ?></div>
                    </div>
                    
                    <div class="form-item">
                        <label for="con_passwordForm">Confirm Password</label>
                        <input type="password" id="con_passwordForm" placeholder="Confirm password" class="input" value="<?php echo $data['password'];?>" >
                        <div class=warn><?php echo $data['confirm_password_err']; ?></div>
                    </div>
                    </div>
                    <input type="submit" class="btn" value="Register">
                </div>
                
            </form>
        </div>
        
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>

</body>