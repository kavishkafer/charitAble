<?php require APPROOT . '/views/inc/header.php'; ?>
    <body>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/home.css">
        <div class="fullContainer banner" id="homeSection">
            <header>
                <div class="container">
                    <div class="logo">
                        <img src="<?php echo URLROOT; ?>/img/home/logo.png" alt="logo">
                    </div>
                
                    <nav>
                        <ul>
                        <?php if(isset($_SESSION['user_id'])) : ?>

  <h3>Welcome </h3>
  <p>You are logged in with  and your user id is <?php echo $_SESSION['user_id']; ?>  </p>
  <?php else : ?> not logged in
<?php endif; ?>

                            <li>
                                <a href="#homeSection">Home</a>
                            </li>
        

                            <li>
                                <a href="<?php echo URLROOT;?>/users/signup_dons">Donors</a>
                            </li>
        

        
                            <li>
                                <a href="<?php echo URLROOT;?>/users/signup_ben">Beneficiaries</a>
                            </li>
        
        
                            <li>
                                <a href="<?php echo URLROOT;?>/users/signup_eh">Event Hosters</a>
                            </li>
        


        
                            <li>
                                <a href="#aboutSection">About Us</a>
                            </li>
                            <li>
                                <a href="#">sign up</a>
                            </li>
                            <li>

                                <a href="<?php echo URLROOT; ?>/users/login">login</a>

                            </li>

                            <li>

                                <a href="<?php echo URLROOT; ?>/postsOut/index">CharitAble Forum</a>

                            </li>


                        </ul>



                    </nav>
    
                </div>

            </header>
                       <!--header ends here-->

            <div class="container">
                <h1>Together We Can <span>Help Them</span></h1>
                <p>Together, you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
                <button>Start with a little</button>
            </div>

        </div>
                        <!--homeSection ends here -->

        <section class="fullContainer" id="aboutSection">

            <div class="container">
                <h2 class="sectionTitle">About Us </h2>
                <p>Here are ways that you can give your hand to those who are in need. </p>
                <div class="cards">
                    <div class="donationBox">
                        <div class="title">Become a Donor</div>
                    <p>As a donor you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
                    <button>  <a href="<?php echo URLROOT; ?>/users/login">Donate Now</a></button>
                    </div>
                    <!--donation box ends here-->

            <div class="beneficiaryBox">
                <div class="title">Become a Beneficiary</div>
                <p>As a beneficiary you can make a meaningful difference in the lives of innocent lives under your care by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
            <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
            </div>
                    <!--donation box ends here-->

            <div class="eventHosterBox">
                <div class="title">Become an Event Host</div>
                <p>As an event host you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
                <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
            </div>
                    <!--donation box ends here-->

                </div>
            </div>
        </section>
                    <!--about section ends here-->

    <section class="donorsContainer cover" id="donorsSection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Together, you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
            <button>  <a href="<?php echo URLROOT; ?>/users/login">login</a></button>
        </div>
    </section>
                    <!--donors section ends here-->

     <section class="beneficiaryContainer cover1" id="beneficiarySection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Together, you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
            <button>Start with a little</button>
        </div>
    </section>
                                    <!--beneficiary section ends here-->
    <section class="beventHostersContainer cover2" id="eventHostersSection">
        <div class="container">
            <h1>Together you can <span>Help Them</span></h1>
            <p>Together, you can make a meaningful difference in the lives of individuals by providing assistance, support, and resources to those in need, fostering a more compassionate and inclusive society for all. Let's join forces to create a positive impact and ensure that nobody is left behind.</p>
            <button>Start with a little</button>
         </div>
    </section>
                    <!--event hosters section ends here-->


                                    

        


<?php if(isset($_SESSION['user_id'])) : ?>
  <h3>Welcome <?php echo $_SESSION['user_id']; ?></h3>
  <p>You are logged in with  and your user id is <?php echo $_SESSION['user_id']; ?>  </p>
  <?php else : ?> not logged in
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>