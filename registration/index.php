<?php require '../functions.php' ?>
<?php $err = registration(); ?>

<?php include '../header.php'; ?>
    <h1 style="text-align: center;">Create a new account</h1>
    <div class="mx-auto" style="width: 250px;margin-top: 50px;">
        <div class="container">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="textHelp"
                           placeholder="Enter Name" name="name"  value="<?php echo $_POST['name']; ?>" >
                    <span style="color: red" class="error"><?php echo $err['name_empty']; ?></span>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter email" name="email" value="<?php echo $_POST['email']; ?>">

                    <span style="color: red" class="error"><?php echo $err['email_empty'];
                        echo $err['email_exist_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                           name="password">
                    <span style="color: red" class="error"><?php echo $err['pass_empty'];
                        echo $err['new_pass']; ?></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password Confirmation</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                           name="password_confirmation">
                    <span style="color: red" class="error"><?php echo $err['pass_empty'];
                        echo $err['new_pass']; ?></span>
                </div>
                <input type="submit" value="Registration" class="btn btn-dark" name="submit">

            </form>
        </div>
    </div>
<?php include '../footer.php'; ?>