<?php require '../functions.php' ?>
<?php session_start(); ?>
<?php user_data(); ?>
<?php $error = change_password(); ?>

<?php include '../header.php'; ?>

    <h2 class="text-center">Change Your Password</h2>

    <h5 class="text-center" style="color: green"><?php echo $error['save']; ?></h5>

    <div class="mx-auto" style="width: 255px;margin-top: 50px;">

        <div class="container">

            <form method="POST">

                <div class="form-group">
                    <label for="exampleInputPassword1">Current password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password"
                           name="current_password">
                    <span style="color: red" class="error"><?php echo $error['current_pass_err'];echo $error['current_pass_empty_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New password</label>

                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password"
                           name="new_password">
 <span style="color: red" class="error"><?php echo $error['new_pass_empty_err'];?></span>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Re-type new password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="password"
                           name="retype_new_password">
                    <span style="color: red" class="error"><?php echo $error['new_pass_err'];echo $error['retype_new_pass_empty_err']; ?></span>
                </div>

                <input type="submit" value="Save" class="btn btn-dark" name="save">


            </form>
        </div>
    </div>
<?php include '../footer.php'; ?>