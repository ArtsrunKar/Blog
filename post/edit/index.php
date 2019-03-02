<?php require "../../functions.php"; ?>
<?php $post = get_post_by_id($_GET['id']); ?>
<?php $err = edit_post(); ?>


<?php include '../../header.php'; ?>

<div class="mx-auto" style="width: 200px;">

    <h3>Edit your post</h3>
    <form action="" method="post">


        <div class="form-group">
            <label for="exampleInputName">title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title" required
                   value="<?php echo $post['title']; ?>">
            <span style="color: red" class="error"><?php echo $err['title_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="description"
                      name="description"><?php echo $post['description']; ?></textarea>
            <span style="color: red" class="error"><?php echo $err['description_err']; ?></span>
        </div>


        <button class="btn btn-dark" name="save">Save</button>
    </form>
    <hr>

</div>
<?php include '../../footer.php'; ?>
