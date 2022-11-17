<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<body>

    <div class="logo">
        <img src="<?php echo URLROOT; ?>/img/logo_black.png" alt="logo">
        </div>
       
     <img class="wave" src="<?php echo URLROOT; ?>/img/signup_wave.svg">  
    <div class="container">
        <div class="img">
            <img src="<?php echo URLROOT; ?>/img/signup_bg.svg">
        </div>
        <div class="login-container">
            <form action="<?php echo URLROOT; ?>/request_bens/add" method="POST">
                <img class="avatar" src="<?php echo URLROOT; ?>/img/signup.svg">
                
                <h2>Add posts</h2>
                
                <div class="input-div one ">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Description</h5>
                        <input name="Donation_Description" type="text" class="input" value="<?php echo $data['Donation_Description']; ?>" >
                        <div class=warn> <?php echo $data['Donation_Description_err']; ?></div> 
                       </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Donation quantity</h5>
                        <input type="text" name="Donation_Quantity" class="input <?php echo (!empty($data['Donation_Quantity'])) ? 'is-invalid' : ''; ?>""  value="<?php echo $data['Donation_Quantity']; ?>">
                        
                        <div class=warn><?php echo $data['Donation_Quantity_err']; ?></div> 
                    </div>
                    
                </div>
                
                    
                    <div class="input-div one ">
                        <div class="i">
                            <i class="fas fa-address-book"></i>
                        </div>
                        <div class="div">
                            <h5>Donation type</h5>
                            <input type="text" name="Donation_Type" class="input"  value="<?php echo $data['Donation_Type'];?>">
                           <div class=warn> <?php echo $data['Donation_Type_err']; ?></div> 
                        </div>
                        </div>
                        <div class="input-div one ">
                            <div class="i">
                                <i class="fas fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>Donation priority</h5>
                                <input type="text" name="Donation_Priority" class="input" value="<?php echo $data['Donation_Priority'];?>" >
                                 <div class=warn><?php echo $data['Donation_Priority_err']; ?></div> 
                            </div>
                            </div>
                           
                
               
                <input type="submit" class="btn" value="submit">
                
            </form>
            
        </div>
        

    </div>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>