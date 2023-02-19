<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_dons.php'; ?>

<div class="container">
<div class="choose-ben">
   <h2>Requests Under Review</h2> 
</div>

<div class="container-review">
<table>
<thead>
    <tr>
        <td>Request_Id</td>
        <td>Beneficiary Name</td>
        <td>Date</td>
        <td>Time</th>
        <td>Food Type</td>
        <td>Quantity</td>
          <td></td>
    </tr>
</thead>

<tbody>
                            
    <tr>
                              
    <?php foreach($data['requests'] as $requests): ?>
        <td> <?php echo $requests->B_Req_ID; ?></td> 
        <td><!--<?php echo $requests->B_Name; ?>--></td>
        <td><?php echo $requests->D_Date; ?></td>
        <td><?php echo $requests->Time; ?></td>
        <td><?php echo $requests->Food_Type; ?></td>
        <td><?php echo $requests->Donation_Quantity; ?></td>
        <td ><a href="<?php echo URLROOT; ?>/schedulereq_dons/show/<?php echo $requests->B_Req_ID;?>">View More</a></td>

    </tr>
    
    <?php endforeach; ?>

                          
   </tbody>
</table>
</div>

</div>
</div>
        </main>


<?php require APPROOT . '/views/inc/footer.php'; ?>

