<?php require "functions.php"; ?>
<?php $posts = get_posts(); ?>

<?php include 'header.php'; ?>



<div class="row" style="margin-top: 10px">


    <?php foreach ($posts as $post) { ?>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $post['user_name']; ?></h5><hr>
                    <p class="card-text"><?php echo $post['title']; ?></p>
                    <p class="card-text"><?php echo  $post['description']; ?></p>
                    <p style="text-align: right;" class="card-text"><?php echo $post['date']; ?></p>
                </div>
                   
            
        </div><br>
        </div>
    <?php } ?>


</div>

<?php include 'footer.php'; ?>


