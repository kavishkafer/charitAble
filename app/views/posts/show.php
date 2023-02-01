<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post/post_show.css">

<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="img/img_dons/logo.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi James!</a>
  </div>

</div>
</div>

<br> 
<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a>

<br> <br> <br>
<div class="card">
<h1><?php echo $data['post']->title; ?></h1>
<br>
<p><?php echo $data['post']->body; ?> </p>

<div class="post-img-div">
                <?php echo $post->image; ?>
             </div> 

             <div class="text-post">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>

             </div>
<?php if($data['post']->user_id == $_SESSION['user_id']) : ?> 
    <?php endif; ?>
    
    <!-- put the following line of code inside the if condition after the login is finalized -->
    <hr>  <br> <br>
    <a href="<?php echo URLROOT; ?>/posts/edit<? echo $data['post']->id; ?>" class="edit-link">Edit</a>
    
    <br> <br> <br> 
    <form action="<?php echo URLROOT; ?>/posts/delete<?php echo $data['post']->id; ?>" method = "post">
        <input type="submit" value="Delete" class="button-delete">
    </form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
