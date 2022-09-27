<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form-Validation</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-5 my-5 mx-5 shadow p-5">
                <h2 class="text-center mt-3 text-warning">Movie Ticket Counter</h2>
                <form class="mt-5" method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name..." name="name">
                        <span><?php echo $nameErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Enter your email..." name="email">
                        <span class="error"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password..." name="password">
                        <span class="error"></span>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Purchase</button>
                </form>
            </div>
            <div class="col shadow m-5 p-5 checking">
                <h2 class="text-center mt-5 text-warning">Check Ticket</h2>
                <?php
                if (isset($_POST)) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if (empty($_POST['name'])) {
                        $nameErr = "Name is required";
                    }
                }
                ?>
                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-header">
                        Name: <?php echo $name; ?> <br>
                        Email: <?php echo $email; ?><br>
                        Password: <?php echo $password; ?>
                    </div>
                </div>
                <?php
                setcookie("fruit", "apple", time() + 5);
                if (isset($_COOKIE['fruit'])) {
                ?>
                    <div class="mt-5">
                        Session-example:<?php echo $_COOKIE['fruit']; ?>
                    </div>
                <?php
                } else {
                ?>
                    <div class="mt-5">
                        Cookie-example:<?php echo "Not Found"; ?>
                    </div>
                    <hr>
                <?php
                }
                ?>

                <?php

                $file = "myFile.txt";
                $handle = fopen($file, 'r');
                if (file_exists($file)) {
                    echo fread($handle, filesize($file));
                }
                fclose($handle);

                $file = "test.txt";
                $handle = fopen($file, 'w');
                //$handle = fopen($file, 'a');
                if (file_exists($file)) {
                    //fwrite($handle," Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.");
                    fwrite($handle, "Lorem ");
                }
                fclose($handle);

                ?>
            </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>