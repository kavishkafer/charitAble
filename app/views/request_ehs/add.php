<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/form.css">
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/img/logo_white.png">
                        </span>
                         <span class="title"></span> 
                    </a>
                </li>

                <li id="#" >
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="title">Requests</span>
                    </a>
                </li>

                

                <li>
                    <a href="<?php echo URLROOT; ?>/posts">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Forum</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-cog"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>
                <?php if(isset($_SESSION['user_id'])) : ?>

                <li>
                    <a href="<?php echo URLROOT;?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
                <?php endif; ?>
                
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>

               
                <div class="user">
                   <i class="fas fa-user"></i>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            

               

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Add Request</h2>
                        <a href="<?php echo URLROOT; ?>/request_ehs/add" class="btn">Add posts</a>
                    </div>
                
                <!-- <div class="input-div one ">
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
                        <input type="text" name="Donation_Quantity" class="input "  value="<?php echo $data['Donation_Quantity']; ?>">
                        
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
                            </div> -->
                           
                
<!--                
                <input type="submit" class="btn" value="submit">
                
            </form> -->
            <form action="<?php echo URLROOT; ?>/request_bens/add" method="POST">
                    <div class="container">
                        <h1>Add</h1>
                        <p>Please fill this to add a request</p>
                        <hr>
                <div class="content-sidebar">
                    <div class="content">
                        <div class="des">
                        <h3> <label for="Event Date"><b>Event Date</b></label></h3>
                    </div>
                    </div>
                    <div class="data">
                        <input type="date" >
                        <div class=warn> <?php if(isset($data['Donation_Description_err'])) echo $data['Donation_Description_err']; ?></div> 
                                 
                    </div>
                    <div class="content">
                        <h3><label for="Donation Type"><b>Event time</b></label></h3>
                    </div>
                    <div class="data">
                        <input type="time" name="Event_Time" placeholder="Event_Time" value="<?php echo $data['Event_Time']; ?>" >
                    </div>
                    <div class="content">
                        <h3><label for="Event Description"><b>Event Description</b></label></h3>
                    </div>
                    <div class="data">
                    <textarea id="subject" name="Event_Description" value="<?php echo $data['Event_Description']; ?>" ></textarea>

                    </div>
                    <div class="content">
                        <label for="Event Letter"><h3>Event Letter</h3></label>
                    </div>
                    <div class="data">
                      <input type="file" name="Event_Letter" placeholder="Event_Letter" value="<?php echo $data['Event_Letter']; ?>">
                    </div>

                </div>
                <input type="submit" class="button button1" value="submit">
                </div>
            </div>
        </div>
    </div>
            
        </div>
        

    </div>
    <script src="<?php echo URLROOT; ?>/js/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>