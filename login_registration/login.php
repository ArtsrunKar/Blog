<?php require_once '../functions.php'; ?>
<?php login(); ?>
<?php $us = login(); ?>
<?php include '../header.php'; ?>
 <?php foreach($us as $user) { ?>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo 'Name - '.$user['name']; ?></h5>
        <p class="card-text"><?php echo 'Email - '.$user['email']; ?></p>
        <p class="card-text"><?php echo 'Age - '.$user['age']; ?></p>


      </div>
    </div>
  <?php  } ?>

   <div class="mx-auto" style="width: 250px;margin-top: 50px;">
  <div class="container">
    <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <button type="submit"  name="login" class="btn btn-primary">Submit</button>
  <a href="registration.php" class="btn btn-primary" role="button" aria-pressed="true">Regisration</a>
  </form>
</div>
</div>
<?php include '../footer'; ?>