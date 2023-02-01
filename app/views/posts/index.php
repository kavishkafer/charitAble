<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_view.css">
<body>


<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="img/img_dons/logow.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi James!</a>
  </div>

</div>
</div>

<br> <br> 

<div class="col">
    <a href="<?php echo URLROOT; ?>/posts/add" class="addPostLink">
    <button class="addPost">Add Post</button>
    </a>
</div>
</div>
<br>

<?php foreach($data['posts'] as $post) : ?>
    <div class="card">
            <h2 class="title"><?php echo $post->title; ?></h2>
            <!-- the following div is for image showing. please note that this is a dummy code-->
            <div class="post-img-div">
                <?php echo $post->image; ?>
             </div> 

                <div>
                <p>Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?> </p>
                </div>
            <p class="text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="moreLink">More</a>

    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
