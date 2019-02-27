<?php require "functions.php"; ?>
<?php $posts = get_posts(); ?>
<?php include 'header.php'; ?>


<div class="row" style="margin-top: 10px">



    <?php foreach ($posts as $post) {?>

        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['user_name']; ?></h5>
                    <p class="card-text"><?php echo 'Title - ' . $post['title']; ?></p>
                    <p class="card-text"><?php echo 'Description - ' . $post['description']; ?></p>
                </div>
            </div>
        </div>
    <?php } ?>


</div>
<?php include 'footer.php'; ?>


