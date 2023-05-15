<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/eventRequest.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">
<!-- ========================= Main ==================== -->

    <!-- ======================= Buttons ================== -->
    <div class="button-box">

        <h2></h2>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">

        <div class="recentOrders">
            <div class="form-container-req">
                <div class="form-inner" id="meal-entry">
                    <form action="<?php echo URLROOT; ?>/request_ehs/requestEvents/<?php echo $data['B_id']; ?>" autocomplete="off" method="POST" enctype="multipart/form-data">
                        <div class="heading-req">
                            <h2>Reserve an Event</h2>
                            <br>
                        </div>

                        <div class="form">
                            <div class="input">
                                <label>Event Name</label>
                                <input type="text" name="event_name" id="event_name" minlength="4" maxlength="50"
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
                                <input type="textfield" name="event_description" id="event_description" minlength="10" maxlength="500"
                                    class="input-field-req" value="<?php echo $data['event_description']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['event_description_err']; ?></div>
                            </div>
<br>
                            <!--legal doc -->
                            <!--legal doc image-->
                            <label>Upload request letter</label>
                            <div class="form1-drag-area">
                                <div class="icon">
                                    <img src="<?php echo URLROOT; ?>/img/components/imageUpload/placeholder-icon.png" alt="placeholder-icon" width="90px" height="90px" id="document_placeholder">
                                </div>

                                <div class="right-content">
                                    <div class="description1">Drag and drop</div>
                                    <div class="form1-upload">
                                        <input type="file" name="document" id="document" style="display: none">
                                        Upload proof of organization's identity
                                    </div>
                                </div>
                            </div>

                            <div class="form1-validation">
                                <div class="document-validation">
                                    <img src="<?php echo URLROOT; ?>/img/components/imageUpload/green-tick-icon.png" alt="green-tick" width="15px" height="15px">
                                    Select a document
                                </div>
                            </div>

                            <!--legal doc end -->

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
</div>

    <!-- =========== Scripts =========  -->
    <script src="<?php echo URLROOT ?>/js/eventHost/main.js"></script>
    <script src="<?php echo URLROOT; ?>/js/components/imageUpload/documentUpload.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>