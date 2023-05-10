<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/admin/navbar.css">

    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/lists.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_view.css">


<div class="main">
<?php require APPROOT . '/views/inc/topbar.php'; ?>



<div class="row">
<div class="col">
    <h1>Posts</h1>
</div>
<br> <br>
   <?php if (isLoggedIn()) : ?>
<div class="col">
    <a href="<?php echo URLROOT; ?>/posts/add" class="addPostLink">
    <button class="addPost">Add Post</button>
    </a>
</div>
<?php endif; ?>
</div>



<?php foreach($data['posts'] as $post) : ?>

    <div class="card">
            <h1 class="title"><?php echo $post->title; ?></h1>
<hr>
<br>
             
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

                    <div class="post-likes" id="post-likes-<?php echo $post->postId;?>"onclick="addLike(<?php echo $post->postId;?>)"><img src="img/comments/like-btn.png" alt="">
                        <div class="posts-likes-count" id="posts-likes-count-<?php echo $post->postId;?>"><?php echo $post->likes;?></div>

                    </div>

                    <div class="post-dislikes" id="post-dislikes-<?php echo $post->postId;?>" onclick="addDislike(<?php echo $post->postId;?>)"><img src="img/comments/dislike-btn.png" alt="">
                        <div class="posts-dislikes-count" id="posts-dislikes-count-<?php echo $post->postId;?>"><?php echo $post->dislikes;?></div>

                    </div>

                </div>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="moreLink">More</a>











    </div>

<?php endforeach; ?>

</div>


<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/post/post.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/jQuery.js"></script>

    <script type="text/javascript">
        var URLROOT = '<?php echo URLROOT; ?>'
    </script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/posts/postsInteractions.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>