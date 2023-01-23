<?php require APPROOT . '/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<a href="<?php echo URLROOT; ?>/posts" class="btm">Back</a>

<br>

<h1><?php echo $data['post']->title; ?></h1>
<div class="text-post">
    Written by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?>
</div>

<p><?php echo $data['post']->body; ?> </p>

<?php if($data['post']->user_id == $_SESSION['user_id']) : ?> 
    <?php endif; ?>
    
    <!-- put the following line of code inside the if condition after the login is finalized -->
    <hr> <a href="<?php echo URLROOT; ?>/posts/edit<? echo $data['post']->id; ?>" class="edit-link">Edit</a>
    <form action="<?php echo URLROOT; ?>/posts/delete<?php echo $data['post']->id; ?>" method = "post">
        <input type="submit" value="Delete" class="button-delete">
    </form>
<?php require APPROOT . '/views/inc/footer.php'; ?>
