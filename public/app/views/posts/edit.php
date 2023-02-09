<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">


<a href="<?php echo URLROOT; ?>/posts" class="btm">Back</a>
<div>
<h2>Edit post</h2>
<form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['$id']; ?>" method="post">
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
<input type="submit" value="Submit" class="addPbtn">
</form>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
