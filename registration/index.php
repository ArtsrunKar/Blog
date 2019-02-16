<?php require '../functions.php' ?>
<?php registration(); ?>

<?php include '../header.php'; ?>
<h1 style="text-align: center;">Create a new account</h1>
   <div class="mx-auto" style="width: 250px;margin-top: 50px;">
  <div class="container">
    <form method="POST">
    	<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp" placeholder="Enter Name" name="name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password Confirmation</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_confirmation">
  </div>
<input type="submit" value="Registration" class="btn btn-dark" name="submit">

  </form>
</div>
</div>
<?php include '../footer.php'; ?>