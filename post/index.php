<?php require "../functions.php"; ?>
<?php
$posts = get_posts();



?>
<?php include '../header.php'?>
<div class="row">
  <a class="btn btn-primary" href="/post/create" role="button" style="float:right;">Add posts</a>
</div>
<div class="row">


  <?php foreach($posts as $post) { ?>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $post['user_name']; ?></h5>
          <p class="card-text"><?php echo 'Title - '.$post['title']; ?></p>
          <p class="card-text"><?php echo 'Description - '.$post['description']; ?></p>
        </div>
      </div>
    </div>
  <?php  } ?>
  <a class="btn btn-primary" href="../index.php">To Main</a>


</div>

<?php include '../footer.php'?>
