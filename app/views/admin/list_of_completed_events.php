<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>
<?php require APPROOT . '/views/inc/topbar.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">

        <!-- ========================= Main ==================== -->
        <div class="main">
            <!-- ======================= Buttons ================== -->
    <div class="btnBox">
                <a href="<?php echo URLROOT; ?>/events/list_of_pending_events"><button class="btn">Pending Event Requests</button></a>
                <a href="<?php echo URLROOT; ?>/events/list_of_accepted_events"><button class="btn">Accepted Events</button></a>
                <a href="<?php echo URLROOT; ?>/events/list_of_completed_events"><button class="btn active">Completed Events</button></a>
            </div>

            <!-- ================ Order Details List ================= -->
            <div class="details">
            <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Completed Events</h2>
                    </div>
                    <form id="filter-form-1" method="get"
                action="<?php echo URLROOT; ?>/donations/completed_events_filter_by_btype">
                <label for="b_type">Filter by beneficiary type:</label>
                <select name="b_type" id="b_type">
                    <option value="" <?php echo empty($_GET['b_type']) ? 'selected' : ''; ?>>All</option>
                    <option value="Children Home"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Children Home' ? 'selected' : ''; ?>>
                        Chidren Home</option>
                    <option value="Elder Home"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Elder Home' ? 'selected' : ''; ?>>Elder
                        Home</option>
                    <option value="Disabled Institutes"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Disabled Institutes' ? 'selected' : ''; ?>>
                        Disabled Institutes</option>
                    <option value="Other"
                        <?php echo isset($_GET['b_type']) && $_GET['b_type'] == 'Other' ? 'selected' : ''; ?>>Other
                    </option>
                </select>
                <input type="hidden" name="d_type" id="hidden-d-type"
                    value="<?php echo isset($_GET['d_type']) ? $_GET['d_type'] : ''; ?>">
            </form>

                    <table>
                        <thead>
                            <tr>
                                <td>Event ID</td>
                                <td>Event Name</td>
                                <td>Organization Name</td>
                                <td>Beneficiary Name</td>
                                <td>Beneficiary Type</td>
                                <td>Date</td>
                                <td>Time</td>
                            </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <?php foreach($data['event_details'] as $event_details): ?>
                                <td><?php echo $event_details->Event_ID; ?></td>
                                <td><?php echo $event_details->E_Name; ?></td>
                                <td><?php echo $event_details->E_Name; ?></td>
                                <td><?php echo $event_details->B_Name; ?></td>
                                <td><?php echo $event_details->B_Type; ?></td>
                                <td><?php echo $event_details->Event_Date; ?></td>
                                <td><?php echo $event_details->Event_Time; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

    <script>
    document.getElementById('b_type').addEventListener('change', function() {
    document.getElementById('hidden-d-type').value = document.getElementById('d_type').value;
    document.getElementById('filter-form-1').submit();
});

document.getElementById('d_type').addEventListener('change', function() {
    document.getElementById('hidden-b-type').value = document.getElementById('b_type').value;
    document.getElementById('filter-form-2').submit();
});
    </script>
    
</body>

</html>