<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/navbar.css">

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="<?php echo URLROOT; ?>/public/img/logo_white.png">
                        </span>
                         <span class="title"></span> 
                    </a>
                </li>

                <li>

                    <a href="#">

                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/request_ehs">
                        <span class="icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="title">Events</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/posts">
                        <span class="icon">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="title">Forum</span>
                    </a>
                </li>

                <li>

                <a href="#">

                        <span class="icon">
                            <i class="fas fa-home"></i>
                        </span>
                    <span class="title">Stats</span>
                </a>
            </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo URLROOT; ?>/users/logout">
                        <span class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>    
            </ul>
        </div>
         <!-- =========== Scripts =========  -->
     <script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
     <script src="<?php echo URLROOT ?>/public/js/navbar.js"></script>
     <script src="<?php echo URLROOT ?>/public/js/admin/main.js"></script>

