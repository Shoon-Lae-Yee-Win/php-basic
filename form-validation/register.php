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
    <?php
    $errorName = $errorEmail = $errorPassword = $errorcomfirmPassword = "";
    $name = $email = $password = $comfirmpassword = "";
    if ($_POST['btnsave']) {
        if ($_POST['name'] == null || $_POST['name'] == "" || empty($_POST['name'])) {
            $errorName = "Please fill your name!";
        } else {
            echo $name = $_POST['name'];
        }

        if ($_POST['email'] == null || $_POST['email'] == "" || empty($_POST['email'])) {
            $errorEmail = "Please fill your email!";
        } else {
            echo $email = $_POST['email'];
        }

        if ($_POST['password'] == null || $_POST['password'] == "" || empty($_POST['password'])) {
            $errorPassword = "Please fill your password!";
        } else {
            echo $password = $_POST['password'];
        }

        if ($_POST['comfirmpassword'] == null || $_POST['comfirmpassword'] == "" || empty($_POST['comfirmpassword'])) {
            $errorcomfirmPassword = "Please fill your comfirmpassword!";
        } else {
            echo $comfirmpassword = $_POST['comfirmpassword'];
        }
    }
    ?>
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
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" placeholder="Enter Username" class="form-control">
                                <small class="text-danger"><?php echo $errorName; ?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control">
                                <small class="text-danger"><?php echo $errorEmail; ?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control">
                                <small class="text-danger"><?php echo $errorPassword; ?></small>
                            </div>
                            <div class="mb-3">
                                <label for="">Comfirmpassword</label>
                                <input type="password" name="comfirmpassword" placeholder="Enter Comfirmassword" class="form-control">
                                <small class="text-danger"><?php echo $errorcomfirmPassword; ?></small>
                            </div>
                            <input type="submit" class="btn bg-success text-white float-end mx-3" name="btnsave" value="Save">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    function checkPassword($password)
    {
        $upperStatus = false;
        $lowerStatus = false;
        $numberStatus = false;
        $specialStatus = false;
        if (preg_match('/[A-Z]/', $password)) {
            $upperStatus = true;
        }
        if (preg_match('/[a-z]/', $password)) {
            $lowerStatus = true;
        }
        if (preg_match('/[0-9]/', $password)) {
            $numberStatus = true;
        }
        if (preg_match('/[!@#$%^&*]/', $password)) {
            $specialStatus = true;
        }
        if ($upperStatus && $lowerStatus && $numberStatus && $specialStatus) {
            return true;
        } else {
            return false;
        }
    }
    if (isset($_POST['btnsave'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comfirmPassword = $_POST['comfirmpassword'];

        if ($name != "" && $email != "" && $password != "" && $comfirmPassword != "") {
            if (strlen($password) >= 6 && strlen($comfirmPassword) >= 6) {
                if ($password == $comfirmPassword) {
                    $status = checkPassword($password);
                    if ($status) {
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = password_hash($password, PASSWORD_BCRYPT);
    ?>
                        <div class="shadow m-5">
                            <h2 class="text-center p-3 text-danger"><?php echo "Register Success!"; ?></h2>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="shadow m-5">
                            <h2 class="text-center p-3 text-danger"><?php echo "Your Password is not Strong!(eg- contain A-Z a-z 0-9 !@#$%^&*)"; ?></h2>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="shadow m-5">
                        <h2 class="text-center p-3 text-danger"><?php echo "Your password not same.Type again!"; ?></h2>
                    </div>
                <?php

                }
            } else {
                ?>
                <div class="shadow m-5">
                    <h2 class="text-center p-3 text-danger"><?php echo "Your Password must be greater than 6."; ?></h2>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="shadow m-5">
                <h2 class="text-center p-3 text-danger"><?php echo "Need to fill.Plz!"; ?></h2>
            </div>
    <?php
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>