<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar_ehs.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/event_hoster/lists.css" />
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/post/post_edit.css">

<div class="main">
<?php require APPROOT . '/views/inc/topbar.php'; ?>

<div class="row">


<br>
<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a>
<br> <br> 

<br>
<div class="card">
<h1>Edit post</h1>

<?php print_r($data); ?>

<br> <br>
<form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">

    <div class="post-image">
        <?php if($data['image_name'] != null): ?>
        <img src="<?php echo URLROOT;?>/img/postsImgs/<?php echo $data['image_name']; ?>" alt="" id="image_placeholder">
        <?php else:?>
        <img src="" alt="" id="image_placeholder" style="display: none;">
<?php endif; ?>
    </div>
<div class="div">
        <label for="title">Title</label>
        <input name="title" type="text" class="addP <?php echo (!empty($data['title_err'])) ?>" value="<?php echo $data['title']; ?>">
        <div class=warn><?php echo $data['title_err']; ?></div>
         
</div>
<br>
<div class="div">
        <label for="body">Body</label>
        <textarea name="body" class="addP <?php echo (!empty($data['body_err'])) ?>"> <?php echo $data['body']; ?> </textarea>
        <div class=warn><?php echo $data['body_err']; ?></div>
         
</div>

    <div class="img">
        <div class="imgBrowse">
            <img src="<?php echo URLROOT; ?>/img/posts/browse-image.png" alt="" id="addImagebtn" onclick="toggleBrowse()">
            <img src="<?php echo URLROOT; ?>/img/posts/remove-image.png" alt="" id="removeImagebtn" style="display: none;" onclick="removeImage()">
            <input type="text" name="intentially_removed" id="intentially_removed" style="display: none;" readonly>
            <input type="file" name="image" id="image" style="display: none;">
        </div>

    </div>
<input type="submit" value="Submit" class="addPbtn">
</form>
</div>
    </div>
    <script type="text/javascript" src="<?php echo URLROOT; ?>/js/posts/posts.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
