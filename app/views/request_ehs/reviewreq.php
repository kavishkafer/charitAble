<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/lists.css" />
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">

<!-- ========================= Main ==================== -->

    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Requests Under Review</h2>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>Event Name</td>
                        <td>Date</td>
                        <td>Time</th>
                        <td>Event Description</td>
                        <td></td>
                    </tr>
                </thead>

                <tbody>

                    <tr>

                        <?php foreach($data['requests'] as $requests): ?>
                        <td><?php echo $requests->Event_Name; ?></td>
                        <td><?php echo $requests->Event_Date; ?></td>
                        <td><?php echo $requests->Event_Time; ?></td>
                        <td><?php echo $requests->Event_Description; ?></td>
                        <td><a href="<?php echo URLROOT; ?>/request_ehs/show/<?php echo $requests->Event_ID;?>">View More</a></td>
                    </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?php echo URLROOT ?>/public/js/eventHost/main.js"></script>


<?php require APPROOT . '/views/inc/footer.php'; ?>