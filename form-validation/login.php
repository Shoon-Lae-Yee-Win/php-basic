<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="mb-3 text-center">
                    <a href="login.php">
                        <button class="btn bg-primary text-white py-3 mb-3" style="width:300px;">Login</button>
                    </a>
                </div>
                <div class="mb-3 text-center">
                    <a href="register.php">
                        <button class="btn bg-success text-white py-3 mb-3" style="width:300px;">Register</button>
                    </a>
                </div>
                <div class="mb-3 text-center">
                    <a href="logout.php">
                        <button class="btn bg-danger text-white py-3 mb-3" style="width:300px;">Logout</button>
                    </a>
                </div>
            </div>
            <div class="col-md-5 mx-5">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <button type="submit" class="btn bg-dark text-white float-end" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    if (isset($_POST['login'])) {
        $useremail = $_POST['email'];
        $userPassword = $_POST['password'];
        if ($useremail != "" && $userPassword != "") {
            if ($useremail == $_SESSION['email'] && password_verify($userPassword, $_SESSION['password'])) {
    ?>
                <div class="shadow m-5">
                    <h2 class="text-center p-3 text-danger"><?php echo "Login Success!"; ?></h2>
                </div>
            <?php
                header("location:home.php");
            } else {
            ?>
                <div class="shadow m-5">
                    <h2 class="text-center p-3 text-danger"><?php echo "Login Failed! Try Again ...."; ?></h2>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="shadow m-5">
                <h2 class="text-center p-3 text-danger"><?php echo "Need to Fill!"; ?></h2>
            </div>
    <?php
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>