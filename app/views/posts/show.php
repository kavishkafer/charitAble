<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_show.css">



<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="/public/img/img_dons/logo.svg" alt="logo"></a>
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
              <img src="<?php echo URLROOT; ?>/img/posts/sample.png" alt="" width="300px">
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

    <!--comment input field-->
    <div class="comment-input-field">
    <input type="text" name="post-comment" id="post-comment" placeholder="Add a comment...">
    <div class="post-footer-commentbtn" id="post-footer-commentbtn">
      <img src="<?php echo URLROOT;?>/img/comments/comment-btn.png" alt="">
    </div>
</div>
    </div>
    
    <!-- put the following line of code inside the if condition after the login is finalized -->
    <!--comments section -->
    <div class="comment-section-container">
      <div class="comment-section-header">
        <h2>Comments</h2>
      </div>

      <!--comment -->
      <div class="comment-container">
        <div class="comment-left">
          <img src="<?php echo URLROOT;?>/img/comments/avatar.png" alt="">
        </div>
        <div class="comment-right">
              <div class="comment-right-header">
                  <div class="comment-user-name">Ishini Avindya</div>
                  <div class="comment-posted-at">Just now</div>
              </div>
              <div class="comment-right-body">BLAAAAA BLAAA BLAAAAA LBLSJFCJFKMVLKFNVLFNVVNK</div>
              <div class="comment-right-footer">

                  <div class="comment-likes">
                    <img src="<?php echo URLROOT;?>/img/comments/like-btn.png" alt="">
                      <div class="comment-likes-count">0</div>
                  </div>

                  <div class="comment-dislikes">
                    <img src="<?php echo URLROOT;?>/img/comments/dislike-btn.png" alt="">
                    <div class="comment-likes-count">0</div>
                  </div>
              </div>
        </div>
      </div>

      <br> <br>
    </div>





    <br> <br>
    <hr> 

    <br> <br>
    <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>">
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <input type="submit" value="Edit" class="button-edit">
    <?php endif; ?>
    </form>
    <br><br>


    <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method = "post">
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
    <input type="submit" value="Delete" class="button-delete">
    <?php endif; ?>
    </form>


    <!--comments-->
    <script type="text/Javascript" src="<?php echo URLROOT; ?>/js/comments/comments.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
