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

      <!--  <?php print_r($data); ?>-->

        <div class="recentOrders" style="width: 80vw;">
            <div class="form-container-req">
                <div class="form-inner" id="meal-entry">
                    <form action="<?php echo URLROOT; ?>/request_ehs/edit/<?php echo $data['Event_ID']; ?>" method="get" enctype="multipart/form-data">
                        <div class="heading-req">
                            <h2>Update Event Request</h2>
                        </div>


                        <div class="document">
                            <?php if($data['document_name'] != null): ?>
                                <img src="<?php echo URLROOT;?>/img/documents/<?php echo $data['document_name']; ?>" alt="" id="document_placeholder" style="width: 60vw; align-self: center">
                            <?php else:?>
                                <img src="" alt="" id="document_placeholder" style="display: none;">
                            <?php endif; ?>
                        </div>


                        <div class="form">
                            <div class="input">
                                <label>Event Name</label>
                                <input type="text" name="Event_Name" id="Event_Name" minlength="4"
                                    class="input-field-req" value="<?php echo $data['Event_Name']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['Event_Name_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Date</label>
                                <input type="date" name="Event_Date" id="Event_Date" minlength="4"
                                    class="input-field-req" value="<?php echo $data['Event_Date']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['Event_Date_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Time</label>
                                <input type="time" name="Event_Time" id="Event_Time" minlength="4"
                                    class="input-field-req" value="<?php echo $data['Event_Time']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['Event_Time_err']; ?></div>
                            </div>

                            <div class="input">
                                <label>Event Description</label>
                                <input type="textfield" name="Event_Description" id="Event_Description" minlength="4"
                                    class="input-field-req" value="<?php echo $data['Event_Description']; ?>"
                                    autocomplete="off" />
                                <div class="warn"><?php echo $data['Event_Description_err']; ?></div>
                            </div>

                         <div class="document">
                                <div class="imgBrowse">
                                    <img src="<?php echo URLROOT; ?>/img/components/docUpload/addDoc.png" alt="" id="addDocbtn" onclick="toggleBrowse()">
                                    <img src="<?php echo URLROOT; ?>/img/components/docUpload/removeDoc.png" alt="" id="removeDocbtn" style="display: none;" onclick="removeDoc()">
                                    <input type="text" name="intentially_removed" id="intentially_removed" style="display: none;" readonly>
                                    <input type="file" name="document" id="document" style="display: none;">
                                </div>

                            </div>

                            <input type="submit" value="Submit" class="btn">

                        </div>

                    </form>
                </div>
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
   <script src="<?php echo URLROOT ?>/public/js/eventHost/docEditEh.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/eventHost/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>