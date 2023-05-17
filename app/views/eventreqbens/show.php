

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
        <!-- ================ Order Details List ================= -->
        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Event Requests</h2>
                </div>

                <div class="content-sidebar">
                    <div style="display: none" class="content">
                        <h3>Event ID</h3>
                    </div>
                    <div class="data" style="display: none">
                        <?php echo $data['requests']->Event_ID; ?>
                    </div>
                    <div class="content">
                        <h3>Event Name</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Event_Name; ?>
                    </div>
                    <!--<div class="content">
                        <h3>Address</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Event_Address; ?>
                    </div> -->
                    <div class="content">
                        <h3>Event Date</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Event_Date; ?>
                    </div>
                    <div class="content">
                        <h3>Time</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['requests']->Event_Time; ?>
                    </div>
                    <div class="content">
                        <h3> Event Description</h3>
                    </div>
                     <div class="data">
                        <?php echo $data['requests']->Event_Description; ?>
                    </div>
                    <div class="content">
                        <h3>Event Letter for consideration</h3>
                    </div>

<div class="data">
    <?php if($data['requests']->document != null) : ?>
        <img src="<?php echo URLROOT;?>/img/documents/<?php echo $data['requests']->document;?>" alt="" width="300px"download>
    <?php else: ?>
        <!--<img src="" alt="" width="300px"> -->
    <?php endif; ?></div>
                   <!-- <div class="data">
                        <?php echo $data['requests']->Donation_Quantity; ?>
                    </div>
                </div> -->
                </div>


                <div class="content-sidebar">
                    <div class="content">
                        <form
                            action="<?php echo URLROOT; ?>/eventreqbens/acceptRequest/<?php echo $data['requests']->Event_ID; ?>"
                            method="post">
                            <?php if ($data['requests']->accepted != 1 && $data['requests']->completed != 1) :?>

                            <input type="submit" class="button button1" id="Edit" value="Accept">

                        <?php endif; ?>
                        </form>

                    </div>
                    <div class="data">
                        <form
                            action="<?php echo URLROOT; ?>/eventreqbens/delete/<?php echo $data['requests']->Event_ID; ?>"
                            method="post">

                            <?php if ($data['requests']->accepted != 1 && $data['requests']->completed != 1) :?>

                            <input type="submit" class="button button2" id="Delete" value="Delete">
                            <?php endif; ?>
                        </form>
                    </div>


                  <!--  <div class="data">
                        <form action="<?php echo URLROOT; ?>/eventreqbens/completeRequestReview/<?php echo $data['requests']->Event_ID; ?>"
                              method="post">

                            <?php if ($data['requests']->accepted == 1 && $data['requests']->completed == 0) :?>
                                <h3>Leave you feedback</h3>

                                <input type="text" class="feedback" id="feedbacl">
                            <?php endif; ?>
                        </form>
                    </div>
                    -->

                    <div class="data">
                        <form action="<?php echo URLROOT; ?>/eventreqbens/completeRequest/<?php echo $data['requests']->Event_ID; ?>"
                                method="post">

                            <?php if ($data['requests']->accepted == 1 && $data['requests']->completed == 0) :?>
                                <input type="submit" class="button button2" id="Complete" value="Complete">
                            <?php endif; ?>
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

</body>

<script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?><?php
