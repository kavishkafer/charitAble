<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<?php require APPROOT . '/views/inc/topbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/view_request.css">



<!-- ========================= Main ==================== -->
<div class="main">
    <!-- ================  Request Details  ================= -->
    <div class="details">
        <div class="recentOrders">
            <h2><?php echo $data['eventHoster']->E_Name; ?></h2>
            <div class="details-card-block">
                <div class="details-card">
                    <div class="details-head">Event Hoster ID</div>
                    <div class="details-input"><?php echo $data['eventHoster']->E_ID; ?>
                    </div>
                </div>
                <br />

                <div class="details-card">
                    <div class="details-head">Event Hoster Name</div>
                    <div class="details-input"><?php echo $data['eventHoster']->E_Name; ?></div>
                </div>
                <br />

                <div class="details-card">
                    <div class="details-head">Event Hoster Email</div>
                    <div class="details-input"><?php echo $data['eventHoster']->E_Email; ?></div>
                </div>
                <br />

                <div class="details-card">
                    <div class="details-head">Event Hoster TP</div>

                    <div class="details-input">
                        <?php echo $data['eventHoster']->E_Tpno; ?></div>

                </div>
                <br />
                <div class="details-card-dif">
                    <div class="details-head">Event Hoster Address</div>
                </div>
                <div class="details-input-dif"><?php echo $data['eventHoster']->E_Address; ?>
                    </div>
                <br />

                <div class="details-card-dif">
                    <div class="details-head">Event Hoster Description</div>
                </div>
                <div class="details-input-dif">
                        <?php echo $data['eventHoster']->E_Description; ?></div>
                <br />
            </div>
            <div class="button">
            <button id="btnApprove" class="btn_1">Approve</button>
<button id="btnDeny" class="btn_1">Deny</button>

            </div>
        </div>

        <div class="recentOrders">
            <h2>Registration Letter</h2>

            <!-- pdf should show here -->
            <div class="pdf-container">
                <iframe src="<?php echo URLROOT; ?>/public/pdf/registration Letter 1.pdf"
                    style="height:575px;width:400px;border:5px solid black;"></iframe>
            </div>

        </div>


    </div>

</div>
<script>
    document.getElementById('btnApprove').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/eventHosters/approve_request/<?php echo $data["eventHoster"]->E_ID; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to approve the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: 'green',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, approve it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Approved!',
          'The request has been approved.',
          'success'
        );
      }
    });
  });
  
  document.getElementById('btnDeny').addEventListener('click', function () {
    const url = '<?php echo URLROOT; ?>/eventHosters/deny_request/<?php echo $data["eventHoster"]->E_ID; ?>';
  
    Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to deny the request.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deny it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = url;
        Swal.fire(
          'Denied!',
          'The request has been denied.',
          'success'
        );
      }
    });
  });
    </script>

<!-- =========== Scripts =========  -->
<!-- <script src="<?php echo URLROOT ?>/public/js/admin/main.js"></script> -->

</body>

</html>