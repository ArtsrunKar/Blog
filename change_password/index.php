<?php require '../functions.php' ?>
<?php session_start(); ?>
<?php user_data(); ?>

<?php include '../header.php'; ?>

<h2 class="text-center">Change Your Password</h2>



       <div class="mx-auto" style="width: 255px;margin-top: 50px;">
  <div class="container">
    <form method="POST">
        
  <div class="form-group">
    <label for="exampleInputPassword1">Current password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">New password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword1">Re-type new password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password" name="password">
  </div>
 
<input type="submit" value="Save" class="btn btn-dark" name="save">


 

  </form>
</div>
</div>
<?php include '../footer.php'; ?>