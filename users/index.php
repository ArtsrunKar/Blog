<?php require "../functions.php"; ?>
<?php
  $users = get_users();

?>
<?php include '../header.php'?>
<div class="row">

  <?php foreach($users as $user) { ?>
    <div class="col-4">
      <div class="card" style="margin-bottom: 15px;">
        <div class="card-body">
          <h5 class="card-title"><?php echo 'Name - '.$user['name']; ?></h5>
          <p class="card-text"><?php echo 'Email - '.$user['email']; ?></p>
          <p class="card-text"><?php echo 'Age - '.$user['age']; ?></p>


        </div>
      </div>
    </div>
  <?php  } ?>
  <a class="btn btn-primary" href="../index.php">To Main</a>


  </div>

<?php include '../footer.php'?>
