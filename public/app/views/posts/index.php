<?php require APPROOT . '/views/inc/header.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/style.css">
<body>


<div class="row">
<div class="col">
    <h1>Posts</h1>
</div>
<div class="col">
    <a href="<?php echo URLROOT; ?>/posts/add" class="addPostLink">
    <button class="addPost">Add Post</button>
    </a>
</div>
</div>

<?php foreach($data['posts'] as $post) : ?>
    <div class="card">
            <h4 class="title"><?php echo $post->title; ?></h4>
             
                <div>
                <p>Written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?> </p>
                </div>
            <p class="text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="moreLink">More</a>

    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>