<?php require "../../functions.php"; ?>
<?php create_users(); ?>

<?php include '../../header.php' ?>
<div class="mx-auto" style="width: 200px;">

    <div class="alert alert-primary" role="alert">
        Add Users
    </div>

    <form action="" method="get">

        <div class="form-group">
            <label for="exampleInputName">Name</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email">


        </div>
        <div class="form-group">
            <label for="exampleInputAge">Age</label>
            <input type="Age" class="form-control" placeholder="Enter age" name="age">

        </div>


        <button type="submit" class="btn btn-primary" name="add">Submit</button>
    </form>
    <hr>
    <a class="btn btn-primary" href="../../index.php">To Main</a>
</div>
<?php include '../../footer.php' ?>
