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
            <div class="col-md-7 mx-5">
                <div class="bg-success text-white text-center py-3">
                    <b class="fs-1">Logout Success!</b>
                </div>
            </div>
        </div>
    </div>

    <?php
    session_start();
    session_destroy();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>