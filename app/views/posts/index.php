<?php require APPROOT . '/views/inc/header.php'; ?>

   <?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>


    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_view.css">





<div class="row">
<div class="col">
    <h1 id="welcome">Welcome! Your act of good heart never fades</h1>
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

        <div class="comment-container">

            <div class="comment-left">
                <img src="<?php echo URLROOT?>/img/comments/avatar.png" alt="">
            </div>

            <div class="comment-user-name"><!--<?php echo $post->user_id?>-->Ishini Avindya
                <div class="comment-user-name" style="color: #aaaaaa"><?php echo convertTimeReadableFormat($post->postCreated); ?></div>

            </div>

        </div>

            <h1 class="title"><?php echo $post->title; ?></h1>
<hr>
<br>

            <div class="post-image">
                <?php if($post->image != null) : ?>
                    <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $post->image;?>" alt="" width="100%vw">
                    <?php else: ?>
              <!--<img src="" alt="" width="300px"> -->
              <?php endif; ?>
            </div> 
            <br>
            <p class="text"><?php echo $post->body; ?></p>







                <div class="post-footer">

                    <div class="post-likes" id="post-likes-<?php echo $post->postId;?>"onclick="addLike(<?php echo $post->postId;?>)"><img src="img/comments/like-btn.png" alt="">
                        <div class="posts-likes-count" id="posts-likes-count-<?php echo $post->postId;?>"><?php echo $post->likes;?></div>

                    </div>

                    <div class="post-dislikes" id="post-dislikes-<?php echo $post->postId;?>" onclick="addDislike(<?php echo $post->postId;?>)"><img src="img/comments/dislike-btn.png" alt="">
                        <div class="posts-dislikes-count" id="posts-dislikes-count-<?php echo $post->postId;?>"><?php echo $post->dislikes;?></div>

                    </div>

                </div>


        <!--for testing purposes only-->
        <!--  <div id="msg"> </div> -->

        <!-- comment thread-->


        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="moreLink">More</a>











    </div>

<?php endforeach; ?>



    <script src="<?php echo URLROOT ?>/js/eventHost/main.js"></script>

<script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/post/post.js"></script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/jQuery.js"></script>

    <script type="text/javascript">
        var URLROOT = '<?php echo URLROOT; ?>'
    </script>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/public/js/posts/postsInteractions.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>