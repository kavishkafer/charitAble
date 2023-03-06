<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_show.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/comments/comments.css">


<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="../public/img/img_dons/logo.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi James!</a>
  </div>

</div>
</div>

<br>
<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a>

<br>
<br>

<div class="post-card">
<h1><?php echo $data['post']->title; ?></h1>
<br>
<div class="post_img">
    <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $post->image;?>" alt="" width="300px">
            </div> 

<br>
<div class="body">
<p><?php echo $data['post']->body; ?> </p>
</div>

<div class="time-post">
   <p> Written by <?php echo $data['user_id']->id; ?>  <?php echo convertTimeReadableFormat($data['post']->created_at); ?> </p>
</div>



<?php if($data['post']->user_id == $_SESSION['user_id']) : ?> 

<?php endif; ?>

    <div class="post-options">
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <input type="submit" value="Edit" class="button-edit">
    <?php endif; ?>
    </form>
    


    <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method = "post">
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <input type="submit" value="Delete" class="button-delete">
    <?php endif; ?>
    </form>
    </div>

    <form method="post">
    <!--comment input field-->
    <div class="comment-input-field">
    <input type="text" name="post-comment" id="post-comment" placeholder="Add a comment...">
    <div class="post-footer-commentbtn" id="post-footer-commentbtn">
      <img src="<?php echo URLROOT;?>/img/comments/comment-btn.png" alt="">
    </div>
</div>
    </form>
    </div>
    
    <!-- put the following line of code inside the if condition after the login is finalized -->
    <!--comments section -->
    <br>
    <div class="comment-section-container">
      <div class="comment-section-header">
        <h2>Comments</h2>
      </div>
            <!--for testing purposes only-->
      <!--  <div id="msg"> </div> -->

        <!-- comment thread-->
        <div id="results"> </div>

<br>
        <!--comment -->

        <!--single comment ends here-->
        <br>









    </div>

    <br> <br> <br>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/jQuery.js"></script>

    <script type="text/javascript">
        var URLROOT = '<?php echo URLROOT; ?>';
        var CURRENT_POST= '<?php echo $data['post']->id; ?>';
    </script>

    <!--comments-->
    <script type="text/Javascript" src="<?php echo URLROOT; ?>/js/comments/comments.js"></script>
    <script type="text/Javascript" src="<?php echo URLROOT; ?>/js/posts/posts.js"></script>

    <?php require APPROOT . '/views/inc/footer.php'; ?>
