<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_view.css">
<body>

<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="img/img_dons/logo.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi Kavishka!</a>
  </div>

</div>
</div>


<div class="row">
<div class="col">
    <h1>Posts</h1>
</div>
<br> <br>
<div class="col">
    <a href="<?php echo URLROOT; ?>/posts/add" class="addPostLink">
    <button class="addPost">Add Post</button>
    </a>
</div>
</div>

<?php foreach($data['posts'] as $post) : ?>

    <div class="card">
            <h1 class="title"><?php echo $post->title; ?></h1>

             
            <div class="post-image">
                <?php if($post->image != null) : ?>
                    <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $post->image;?>" alt="" width="300px">
                    <?php else: ?>
              <!--<img src="" alt="" width="300px"> -->
              <?php endif; ?>
            </div> 
            <br>
            <p class="text"><?php echo $post->body; ?></p>

          


            <div class="time-post">
                <p>Written by Ishini <?php echo convertTimeReadableFormat($post->postCreated); ?> </p>
                </div>


                <div class="post-footer">

                <div class="post-likes">Likes 0</div>
                <div class="post-dislikes">Dislikes 0</div>
                </div>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="moreLink">More</a>











    </div>
<?php endforeach; ?>

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/post/post.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>