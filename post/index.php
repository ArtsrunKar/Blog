<?php require "../functions.php"; ?>
<?php
$posts = get_posts();


?>
<?php include '../header.php'?>
<div class="text-right">
  <a class="btn btn-dark" href="create" role="button" style="float:right;">Add posts</a>
</div>
<div class="row">


  <?php foreach($posts as $post) { if ($_SESSION['User_id']==$post['user_id']) {
    # code...
   ?>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $post['user_name']; ?></h5>
          <p class="card-text"><?php echo 'Title - '.$post['title']; ?></p>
          <p class="card-text"><?php echo 'Description - '.$post['description']; ?></p>
        </div>
      </div>
    </div>
  <?php  }} ?>



</div>

<?php include '../footer.php'?>
