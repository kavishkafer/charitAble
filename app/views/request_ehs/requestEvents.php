<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/eventRequest.css">


<!-- ========================= Main ==================== -->
<div class="main">
    <?php require APPROOT . '/views/inc/topbar.php'; ?>

    <!-- ======================= Buttons ================== -->
    <div class="button-box">

        <h2></h2>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">

        <div class="recentOrders">
            <div class="form-container-req">
                <div class="form-inner" id="meal-entry">
                    <form action="<?php echo URLROOT; ?>/request_ehs/requestEvents/<?php echo $data['B_id']; ?>"
                        autocomplete="off" method="POST">
                        <div class="heading-req">
                            <h2>RESERVE A EVENT</h2>
                        </div>

                        <div class="form">
                            <div class="input">
                                <label>Event Name</label>
                                <input type="text" name="event_name" id="event_name" minlength="4"
                                    class="input-field-req" value="<?php echo $data['event_name']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['event_name_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Date</label>
                                <input type="date" name="event_date" id="event_date" minlength="4"
                                    class="input-field-req" value="<?php echo $data['event_date']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['event_date_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Time</label>
                                <input type="time" name="event_time" id="event_time" minlength="4"
                                    class="input-field-req" value="<?php echo $data['event_time']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['event_time_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Description</label>
                                <input type="textfield" name="event_description" id="event_description" minlength="4"
                                    class="input-field-req" value="<?php echo $data['event_description']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['event_description_err']; ?></div>
                            </div>

                            <input type="submit" value="Submit" class="btn">

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="recentOrders">
            <div class="calender-container">
                <div class="calendar">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/public/js/admin/main.js"></script>
    </body>

    </html>