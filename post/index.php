<?php require "../functions.php"; ?>
<?php $posts = get_posts(); ?>
<?php delete_post(); ?>
<?php edit_post(); ?>
<?php include '../header.php' ?>

<div class="text-right">
    <div class="row">
        <a class="btn btn-dark" href="create" role="button" style="float:right;">Add post</a>
    </div>
</div>
<div class="row" style="margin-top: 10px;">


    <?php foreach ($posts as $post) {
        if ($_SESSION['user_info']['id'] == $post['user_id']) { ?>


            <div style="margin-top: 10px;" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $post['user_name']; ?></h5>
                        <p class="card-text"><?php echo $post['title']; ?></p>
                        <p class="card-text"><?php echo $post['description']; ?></p>
                    </div>

                </div>

                <div>


                    <a href="/post/edit?id=<?php echo $post['id']; ?>" name="post_edit"
                       class="btn btn-secondary btn-sm">edit</a>

                


                    <form method="POST">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                        <button name="post_delete" class="btn btn-secondary btn-sm">delete</button>
                    </form>

                </div>


            </div>
        <?php }
    } ?>


</div>

<?php include '../footer.php' ?>
