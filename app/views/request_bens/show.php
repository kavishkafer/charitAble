

<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/navbar_ben.php'; ?>

        <!-- ========================= Main ==================== -->


            <!-- ======================= Cards ================== -->
            

               

            <!-- ================ Order Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="<?php echo URLROOT; ?>/request_bens/add" class="btn">Add posts</a>
                    </div>


                <div class="content-sidebar">
                        <div class="content">
                            <h3>Donation ID</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['request']->Donation_ID; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Description</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['request']->Donation_Description; ?>
                        </div>
                    <div class="content">
                        <h3>Donation Details</h3>
                    </div>
                    <div class="data">
                        <?php echo $data['request']->Donation_Details; ?>
                    </div>
                        <div class="content">
                            <h3>Donation Type</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['request']->Donation_Type; ?>
                        </div>
                        <div class="content">
                            <h3>Donation Quantity</h3>
                        </div>
                        <div class="data">
                        <?php echo $data['request']->Donation_Quantity; ?>
                        </div>
                    <div class="content">
                        <h3>Accepted percentage</h3>
                    </div>
                    <div class="data">
                        <div class="progress-bar-container">
                            <div class="progress-bar"></div>
                            <div class="progress-value">0%</div>
                        </div>
                        <script>
                            var progressBar = document.querySelector('.progress-bar');
                            var progressValue = document.querySelector('.progress-value');

                            var percent = <?php echo ($data['request']->Donation_Quantity-$data['request']->Remaining_Quantity)/($data['request']->Donation_Quantity)*100;?> // replace with a value from your database

                                progressBar.style.width = percent + '%';
                            progressValue.innerHTML = percent + '%';
                        </script>
                    </div>
                    <div class="content">
                        <h3>Status</h3>
                    </div>
                    <div class="data">
                        <?php if ($data['request']->Accepted && $data['request']->Completed || $data['request']->Expiry){
                            echo "Expired";
                        }
                        else{ echo "Active";}
                        ; ?>
                    </div>
                    </div>

                    <?php if($data['request']->Donation_Quantity == $data['request']->Remaining_Quantity) {;?>
                    <div class="content-sidebar">
                        <div class="content">
                        <form
                                action="<?php echo URLROOT; ?>/request_bens/edit/<?php echo $data['request']->Donation_ID; ?>"
                                method="post">
                                <input type="submit" class="button button1" id="Edit" value="Edit">
                            </form>
                           
                        </div>
                        <div class="data">
                            <form
                                action="<?php echo URLROOT; ?>/request_bens/delete/<?php echo $data['request']->Donation_ID; ?>"
                                method="post">
                                <input type="submit" class="button button2" id="Delete" value="Delete">
                            </form>
                        </div>
                    </div>
                    <?php  } ?>
                </div>
               <div class="recentOrders">
                   <h2>Donation History</h2>
                       <?php if ($data['partial']!=0){ ?>
                           <table>
                               <thead>
                               <tr>

                                   <td>Donor name</td>
                                   <td>Telephone number</td>
                                   <td>Donation Quantity</td>









                               </tr>
                               </thead>
<!--                                <form action="--><?php //echo URLROOT; ?><!--/request_bens/completeRequest/--><?php //echo $data['request']->Id?><!--" method="post">-->
                               <tbody>
                               <?php foreach($data['partial'] as $request): ?>
                                   <form action="<?php echo URLROOT; ?>/request_bens/completePartialRequest/<?php echo $request->Id?>" method="post">

                               <tr>




                                   <td><?php echo $request->D_Name; ?></td>
                                   <td> <?php echo $request->D_Tel_No; ?></td>
                                   <td><?php echo $request->Donation_Quantity; ?></td>
                                   <td><input type="submit" class="button button1" id="Complete" value="complete"> </td>
                                   </form>

<!--                                   <td>--><?php //echo $request->Donation_Type; ?><!--</td>-->
<!--                                   <td>--><?php //echo $request->Remaining_Quantity; ?><!--</td>-->
<!--                                   <td style="justify-content: center;">--><?php //echo $request->Donation_Priority; ?><!--</td>-->

<!--                                   <td><a href="--><?php //echo URLROOT;?><!--/BenReqDons/show/--><?php //= $request->Donation_ID; ?><!--">View</a></td>-->


                               </tr>
                               <?php endforeach; ?>




                               </tbody>
                           </table>




                       <?php }elseif(($data['partial']==null) && ($data['request']->Accepted==1)){?>
                           <form action="<?php echo URLROOT; ?>/request_bens/completeFullRequest/<?php echo $data['request']->Donation_ID; ?>" method="post">

                           <table>
                               <thead>
                               <tr>
                                   <td>Donor name</td>
                                   <td>Telephone number</td>
                                   <td>Donation Quantity</td>
                           </tr>
                                 </thead>
                                 <tbody>
                                 <tr>
                                      <td><?php echo $data['donor']->D_Name; ?></td>
                                      <td> <?php echo $data['donor']->D_Tel_No; ?></td>
                                      <td><?php echo $data['request']->Donation_Quantity; ?></td>
                                     <td> <input type="submit" class="button button1" id="Complete" value="complete"></td>
                                 </tr>
                                 </tbody>
                            </table>
                            </form>




                               <?php   }
                       else{ ?>

                           <div class="nodata"> <img src="<?php echo URLROOT; ?>/img/nodata.svg" alt="empty" class="empty">
                               <h3>No donors has accepted the request yet</h3><br></div>
                       <?php }?>

                   </div>
            </div>

    </div>


                <!-- ================= New Customers ================ -->
               
            </div>
        </div>
    </div>

    

 <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>