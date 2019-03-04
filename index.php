<?php require "functions.php"; ?>
<?php $posts = get_posts(); ?>

<?php include 'header.php'; ?>

  <span class="search">
   <input type="text" name="" class="search-txt" placeholder="Search..."/>
   <button class="search-btn">
    <i class="far fa-search"></i>
   </button>
  </span>

<div class="row" style="margin-top: 10px">


    <?php foreach ($posts as $post) { ?>

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $post['user_name']; ?></h4><hr>
                    <p class="card-text"><?php echo $post['title']; ?></p>
                    <p class="card-text"><?php echo  $post['description']; ?></p>
                    <p style="text-align: right;" class="card-text"><?php echo $post['date']; ?></p>
                </div>
                   
            
        </div><br>
        </div>
    <?php } ?>


</div>

<?php include 'footer.php'; ?>


