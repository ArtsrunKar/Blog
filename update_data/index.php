<?php require '../functions.php' ?>

<?php user_data(); ?>

<?php include '../header.php'; ?>

<h2 class="text-center">Update Your Data</h2>



       <div class="mx-auto" style="width: 255px;margin-top: 50px;">
  <div class="container">
    <form method="POST">
        <div class="form-group">
    <label for="exampleInputEmail1"><?php echo "Your Name  ".$_SESSION['User']; ?></label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Enter new name" name="name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"><?php echo "Your Email  ".$_SESSION['Email']; ?></label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter new email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Current password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Current password" name="password">
  </div>
 
<input type="submit" value="save" class="btn btn-dark" name="save">


  <a href="/change_password" class="btn btn-dark" role="button" aria-pressed="true">Change password</a>

  </form>
</div>
</div>
<?php include '../footer.php'; ?>