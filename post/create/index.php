<?php require "../../functions.php"; ?>

<?php $users = get_users(); ?>
<?php create_posts(); ?>
<?php include '../../header.php'?>
<div class="mx-auto" style="width: 200px;">

  <div class="alert alert-primary" role="alert">
    Add Posts
  </div>
  <form action="" method="post">

      <div class="form-group">
          <label for="exampleFormControlSelect1">select User</label>
          <select name="user_id" class="form-control" id="exampleFormControlSelect1">
            
            <option value="<?php echo $_SESSION['User']; ?>"><?php echo $_SESSION['User']; ?></option>

          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputName">title</label>
          <input type="text" class="form-control" placeholder="Enter title" name="title">
        </div>
        <div class="form-group">
   <label for="exampleFormControlTextarea1">Description</label>
   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description" name="description"></textarea>
 </div>


  <button type="submit" class="btn btn-primary" name="add">Submit</button>
</form>
<hr>
<a class="btn btn-primary" href="../../index.php">To Main</a>
</div>
<?php include '../../footer.php'?>
