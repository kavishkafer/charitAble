<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/view_request.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">


<!-- ========================= Main ==================== -->

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <h2><?php echo $data['requests']->Event_Name; ?></h2>


            <div class="details-card">
                <div class="details-head">Event Name</div>
                <div class="details-input"><?php echo $data['requests']->Event_Name; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Event Date</div>
                <div class="details-input"><?php echo $data['requests']->Event_Date; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Event Time</div>
                <div class="details-input"><?php echo $data['requests']->Event_Time; ?></div>
            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Event Description</div>

                <div class="details-input"><?php echo $data['requests']->Event_Description; ?></div>

            </div>
            <br />

            <div class="details-card">
                <div class="details-head">Event Letter</div>

                <?php if($data['requests']->document != null) : ?>
                    <img src="<?php echo URLROOT;?>/img/documents/<?php echo $data['requests']->document;?>" alt="" width="300px"download>
                <?php else: ?>
                    <!--<img src="" alt="" width="300px"> -->
                <?php endif; ?>

            </div>
            <br />

            <div class="content-sidebar">
                        <div class="content">

                            <form
                                action="<?php echo URLROOT; ?>/request_ehs/edit/<?php echo $data['requests']->Event_ID; ?>"
                                method="post">
                                <input type="submit" class="btn4" id="Edit" value="Edit">
                            </form>
                           
                        </div>
                        <div class="data">
                            <form
                                action="<?php echo URLROOT; ?>/request_ehs/delete/<?php echo $data['requests']->Event_ID; ?>"
                                method="post">
                                <input type="submit" class="btn3" id="Delete" value="Delete">
                            </form>
                        </div>
                    </div>
        </div>
    </div>
</div>

<!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/public/js/toggle.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/eventHost/main.js"></script>



<?php require APPROOT . '/views/inc/footer.php'; ?>