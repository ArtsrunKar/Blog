<?php require "../../functions.php"; ?>

<?php $users = get_users(); ?>
<?php $err = create_posts(); ?>
<?php include '../../header.php' ?>

<div class="mx-auto" style="width: 200px;">


    <form action="" method="post">


        <div class="form-group">
            <label for="exampleInputName">title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title" required>
            <span style="color: red" class="error"><?php echo $err['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description"
                      name="description"></textarea>
            <span style="color: red" class="error"><?php echo $err['description_err']; ?></span>
        </div>


        <button type="submit" class="btn btn-dark" name="add">Submit</button>
    </form>
    <hr>

</div>
<?php include '../../footer.php' ?>
