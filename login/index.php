<?php require_once '../functions.php'; ?>
<?php $err = login(); ?>

<?php include '../header.php'; ?>

    <h1 style="text-align: center;">Login</h1>
    <div class="mx-auto" style="width: 250px;margin-top: 50px;">
        <div class="container">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Enter email" name="email">
                    <span style="color: red" class="error"><?php echo $err['email_err']; ?></span>

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                           name="password">
                    <span style="color: red" class="error"><?php echo $err['pass_empty'];
                        echo $err['login_err']; ?></span>
                </div>
                <button type="submit" name="login" class="btn btn-dark">Submit</button>
                <a href="/registration" class="btn btn-dark" role="button" aria-pressed="true">Regisration</a>
            </form>
        </div>
    </div>

<?php include '../footer.php'; ?>