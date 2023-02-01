<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post/post_edit.css">

<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="img/img_dons/logo.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi James!</a>
  </div>

</div>
</div>
<br> <br> 
<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a>

<br> <br>
<div>
<h1>Edit post</h1>

<div class="card">
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

<div class="div">
        <label for="image">Image</label>
        <input name="image" type="file" class="addP <?php echo (!empty($data['image_err'])) ?>" value="<?php echo $data['image']; ?>">
        <div class=warn><?php echo $data['image_err']; ?></div>
         
</div>

<input type="submit" value="Submit" class="addPbtn">
</form>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
