<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/lists.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post/post_add.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/donor/style.css">


<br> <br>



<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a> <br> 
<div>
<h1>Add post</h1>
<br>
<form action="<?php echo URLROOT; ?>/posts/add" method="post" enctype="multipart/form-data">

    <div class="post-image">
        <img src="" alt="" id="image_placeholder" style="display: none;">
        <div class=warn><?php echo $data['image_err']; ?></div>

    </div>


<div class="card">
<div class="div">
        <label for="title">Title</label>
        <input name="title" type="text" class="addP <?php echo (!empty($data['title_err'])) ?>" value="<?php echo $data['title']; ?>">
        <div class=warn><?php echo $data['title_err']; ?></div>

</div>
<br>
<div class="div">
        <label for="body">Body</label>
        <textarea name="body" class="addP <?php echo (!empty($data['body_err'])) ?>" value="<?php echo $data['body']; ?>"> </textarea>
        <div class=warn><?php echo $data['body_err']; ?></div>

</div>

<br>

<div class="img">
    <div class="imgBrowse">
        <img src="<?php echo URLROOT; ?>/img/posts/browse-image.png" alt="" id="addImagebtn" onclick="toggleBrowse()">
        <img src="<?php echo URLROOT; ?>/img/posts/remove-image.png" alt="" id="removeImagebtn" style="display: none;" onclick="removeImage()">
        <input type="file" name="image" id="image" style="display: none;">
    </div>



</div>

<input type="submit" value="Submit" class="addPbtn">

</div>
</form>
</div>


    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/posts/posts.js"></script>
<script src="<?php echo URLROOT ?>/js/eventHost/main.js"></script>

<?php require APPROOT . '/views/inc/footer.php'; ?>
