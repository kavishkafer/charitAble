<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/lists.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">

        
<!-- ========================= Main ==================== -->
<div class="heading">
<h1>Start requesting an event</h1>
</div>
<!-- ======================= Buttons ================== -->
            <div class="btnBox">
                
                <h2>Choose a Beneficiary</h2>
            </div>
      
            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Beneficiaries</h2>
                    </div>
                    <!--
                    <label for="b_type">Filter by beneficiary type:</label>

                    <div>
                        <form id="filter-form" method="get" action="<?php echo URLROOT; ?>/Requests_ehs/filter_by_type">
                    <select name="B_Type" id="B_Type">
                        <option value="" <?php echo empty($_GET['B_Type']) ? 'selected' : ''; ?>>All</option>
                        <option value="Children Homes"
                            <?php echo isset($_GET['B_Type']) && $_GET['B_Type'] == 'Children Homes' ? 'selected' : ''; ?>>
                            Chidren Homes</option>
                        <option value="Elder Homes"
                            <?php echo isset($_GET['B_Type']) && $_GET['B_Type'] == 'Elder Homes' ? 'selected' : ''; ?>>Elder
                            Homes</option>
                        <option value="Disabled Institutes"
                            <?php echo isset($_GET['B_Type']) && $_GET['B_Type'] == 'Disabled Institutes' ? 'selected' : ''; ?>>
                            Disabled Institutes</option>
                        <option value="Other"
                            <?php echo isset($_GET['B_Type']) && $_GET['B_Type'] == 'Other' ? 'selected' : ''; ?>>Other
                        </option>
                    </select>
                        </form>
                    </div>

                    <input type="text" id="search-input" placeholder="Search by name...">
                    -->
                     <table>
                        <thead>
                            <tr>
                                <td style="display: none">Beneficiary ID</td>
                                <td>Beneficiary Name</td>
                                <td>Email</td>
                                <td>TP</td>
                                <td>Address</td>
                                <td></td>
                            </tr>
                        </thead>
                        
                       
                         <tbody> 
                            <tr>
                                <?php foreach($data['beneficiaries'] as $beneficiary_details): ?>
                                <td style="display: none"><?php echo $beneficiary_details->B_Id; ?></td>
                                <td class=".ben-name"><?php echo $beneficiary_details->B_Name; ?></td>
                                <td><?php echo $beneficiary_details->B_Email; ?></td>
                                <td><?php echo $beneficiary_details->B_Tpno; ?></td>
                                <td><?php echo $beneficiary_details->B_Address; ?></td>
                                <td><a href="<?php echo URLROOT; ?>/request_ehs/requestEvents/<?php echo $beneficiary_details->B_Id; ?>"><button class="btn_1">Select</button></td></a></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            </div>

    <!-- =========== Scripts =========  -->
<script src="<?php echo URLROOT ?>/js/eventHost/main.js"></script>
<!--
<script>
    document.getElementById('B_Type').addEventListener('change', function() {
        document.getElementById('filter-form').submit();
    });

    function filterBeneficiaries() {
        const input = document.getElementById('search-input');
        const filter = input.value.toUpperCase();
        const table = document.querySelector('table');
        const rows = table.getElementsByTagName('tr');

        for (let i = 0; i < rows.length; i++) {
            const nameCell = rows[i].getElementsByClassName('.ben-name')[0];
            if (nameCell) {
                const name = nameCell.textContent || nameCell.innerText;
                if (name.toUpperCase().indexOf(filter) > -1) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }

    document.getElementById('search-input').addEventListener('keyup', filterBeneficiaries);
</script>
-->
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    

