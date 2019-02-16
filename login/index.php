<?php require_once '../functions.php'; ?>
<?php login(); ?>

<?php include '../header.php'; ?>

<h1 style="text-align: center;">Login</h1>
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
  <button type="submit"  name="login" class="btn btn-dark">Submit</button>
  <a href="/registration" class="btn btn-dark" role="button" aria-pressed="true">Regisration</a>
  </form>
</div>
</div>

<?php include '../footer'; ?>