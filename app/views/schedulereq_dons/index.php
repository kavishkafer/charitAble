<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/schedulereq.css">


<div class="details">
    <div class="cardHeader">
        <h1>Choose A Beneficiary</h1>

    </div>

    <div class="searchwrapper">

        <input type="text" name="input" id="live_search" placeholder="Search Benificiaries" autocomplete="off">
    </div>

    <div class="recentOrders" id="result">
        <div class="cardHeader">

        </div>
        <table id="table" class="tableBen">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Telephone No</th>
                <th>E-mail</th>
                <th>Members</th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <?php foreach ($data['search'] as $search): ?>
                <td><?php echo $search->B_Name; ?></td>
                <td><?php echo $search->B_Address; ?></td>
                <td><?php echo $search->B_Type; ?></td>
                <td><?php echo $search->B_Tpno; ?></td>
                <td><?php echo $search->B_Email; ?></td>
                <td><?php echo $search->B_Members; ?></td>
                <td ><a href="<?php echo URLROOT; ?>/schedulereq_dons/add/<?php echo $search->B_Id; ?>"
                       >Select</a></td>
                <td><a href="<?php echo URLROOT; ?>/profilebens/index/<?php echo $search->B_Id; ?>" >View
                        Profile</a></td>

            </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<script>
    $(document).ready(function() {
        var debounceTimer;
        $('#live_search').on('input', function() {
            var input = $(this).val();
            if (input !== '') {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(function() {
                    $.ajax({
                        url: "<?php echo URLROOT; ?>/Schedulereq_dons/searchBen",
                        method: "POST",
                        data: { input: input },
                        success: function(data) {
                            $('#result').html(data);

                            if ($.trim(data) === '') {
                                $('#result').html('');
                            }
                        }
                    });
                }, 500);
            } else {
                $('#result').html('');
            }
        });
    });
</script>


<script src="<?php echo URLROOT; ?>/js/donor/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>

