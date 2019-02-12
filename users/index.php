<?php require "../functions.php"; ?>
<?php
  $users = get_users();

?>
<?php include '../header.php'?>
<div class="mx-auto" style="width: 200px;">

  <?php foreach($users as $user) { ?>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo 'Name - '.$user['name']; ?></h5>
        <p class="card-text"><?php echo 'Email - '.$user['email']; ?></p>
        <p class="card-text"><?php echo 'Age - '.$user['age']; ?></p>


      </div>
    </div>
  <?php  } ?>
  <a class="btn btn-primary" href="../index.php">To Main</a>


  </div>

<?php include '../footer.php'?>
