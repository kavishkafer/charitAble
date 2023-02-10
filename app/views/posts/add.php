<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/post/post_add.css">

<div class="row">
<div class="col-head">
    
<div class="header">
  <a href="#default" class="logo"><img src="../public/img/img_dons/logo.svg" alt="logo"></a>
  <div class="header-right">
    <a href="#about">Hi James!</a>
  </div>

</div>
</div>


<a href="<?php echo URLROOT; ?>/posts" class="btn">Back</a> <br> 
<div>
<h1>Add post</h1>
<br>
<form action="<?php echo URLROOT; ?>/posts/add" method="post">

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

<div class="div">
        <label for="image">Image</label>
        <input name="image" type="file" class="addP <?php echo (!empty($data['image_err'])) ?>" value="<?php echo $data['image']; ?>">
        <div class=warn><?php echo $data['image_err']; ?></div>
         
</div>

<input type="submit" value="Submit" class="addPbtn">

</div>
</form>
</div>
    <script src="<?php echo URLROOT; ?>/js/beneficiary/main.js"></script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
