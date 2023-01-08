<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/topbar.css">

<div class="topbar">
    <div class="toggle">
        <i class="fas fa-bars"></i>
    </div>
    
    <div class="navbar__right">
        <ul>
            <li>
                <a href="#">
                    <i class="fas fa-bell"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <span id="userName"><?php echo $_SESSION['admin_name'];?></span><br>
                </a>
            </li>
        </ul>
    </div>
</div>