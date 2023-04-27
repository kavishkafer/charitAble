

<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/benificiary/ben_dashboard.css">
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
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-comment"></i>
                        </span>
                        <span class="title">Stats</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Calender</span>
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
                    <a href="<?php echo URLROOT;?>/users/logout_ben">
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
                        <h2>Accept Request</h2>
<!--                         <a href="<?php echo URLROOT; ?>/request_bens/add" class="btn">Add posts</a>
 -->                    </div>

                    <!-- <table>
                        <thead>
                            <tr>
                                <td>Request_Id</td>
                                <td>Description</td>
                                <td>Type</td>
                                <td>Quantity</td>
                                <td>Priority</td>
                                
                            </tr>
                        </thead>

                        <tbody>
                            
                            <tr>
                               
                           
                            </tr>
                            <tr>
                                <?php if($data['request']->B_Id == $_SESSION['user_id']) : ?>
                           
                            <h1><?php echo $data['request']->Donation_ID; ?></h1>
                               <td> <h1><?php echo $data['request']->Donation_Description; ?></h1></td></td>
                               <h3> <?php echo $data['request']->Donation_Quantity; ?></h3>
                                   <?php echo $data['user']->B_Name?>   
                             <?php endif; ?>
                            </tr>
                
                            <tr>
                        
                            </tr>
                            <div>
                                <form action="<?php echo URLROOT; ?>/request_bens/edit/<?php echo $data['request']->Donation_ID ?>" method="post">
                                <input type="submit" value="Edit" >
                                </form>
                                <form action="<?php echo URLROOT; ?>/request_bens/delete/<?php echo $data['request']->Donation_ID; ?>" method="post">
                                <input type="submit" value="Delete" >
                                </form>
                           </div>
                        </tbody>
                    </table>
                </div> -->
                    <form
                        action="<?php echo URLROOT; ?>/BenReqDons/show/<?php echo $data['requests']->Donation_ID?>"
                        method="post">
                <div class="content-sidebar">
                        <div class="content">
                            <h3>Donation ID</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_ID; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Description</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_Description; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Type</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['requests']->Donation_Type; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Quantity</h3>
                        </div>
                        <div class="data">
                            <input type="text" name="Donation_Quantity" placeholder="quantity" value="<?php echo $data['requests']->Remaining_Quantity; ?>">
                            <div class="warn"> <?php if(isset($data['Quantity_err'])) echo $data['Quantity_err']; ?></div>
                        </div>
                    </div>


                    <div class="content-sidebar">
                        <div class="content">

                                <input type="submit" class="button button1" id="Edit" value="Accept">
                            </form>
                           
                        </div>
                       
                    </div>
                    </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </div>


                <!-- ================= New Customers ================ -->
               
            </div>
        </div>
    </div>

    

 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>