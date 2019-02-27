<?php require '../functions.php' ?>

<?php user_data(); ?>
<?php $err = update_data(); ?>


<?php include '../header.php'; ?>

    <h2 class="text-center">Update Your Data</h2>
    <h5 class="text-center" style="color: green"><?php echo $err['save']; ?></h5>

    <form method="POST">

        <div class="mx-auto" style="width: 255px;margin-top: 50px;">

            <div class="container">
                <form method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
                               placeholder="Enter new name" name="name"
                               value="<?php echo $_SESSION['user_info']['name']; ?>">
                        <span style="color: red" class="error"><?php echo $err['name_err']; ?></span>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Your Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                               placeholder="Enter new email" name="email"
                               value="<?php echo $_SESSION['user_info']['email']; ?>">
                        <span style="color: red" class="error"><?php echo $err['email_err'];
                            echo $err['email_exist_err']; ?></span>

                    </div>


                    <input type="submit" value="save" class="btn btn-dark" name="save">


                    <a href="/change_password" class="btn btn-dark" role="button" aria-pressed="true">Change
                        password</a>

                </form>
            </div>
        </div>
    </form>
<?php include '../footer.php'; ?>