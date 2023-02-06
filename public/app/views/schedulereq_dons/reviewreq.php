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
        <td>Date</td>
        <td>Time</td>
        <td>Food Type</td>
        <!--<td>Quantity</td>-->
          <td></td>
    </tr>
</thead>

<tbody>
                            
    <tr>
                              
    <?php foreach($data['requests'] as $requests): ?>
        <td> <?php echo $requests->D_Id; ?></td> 
        <!--<td><?php echo $requests->name; ?></td>-->
        <td><?php echo $requests->D_Date; ?></td>
        <td><?php echo $requests->Time; ?></td>
        <td><?php echo $requests->Food_Type; ?></td>
        <td><!--<?php echo $requests->quantity; ?></td>-->
        <td><!--<?php if($data['requests']->D_Id == $_SESSION['D_Id']) : ?>-->
         <form action="<?php echo URLROOT; ?>/schedulereq_dons/delete/<?php echo $requests->id; ?>" method="post">
         <input type="submit" value="Delete" class="btn" >
         </form>
         <?php endif; ?>
       </td>

    </tr>
    
    <?php endforeach; ?>

                          
   </tbody>
</table>
</div>

</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>

