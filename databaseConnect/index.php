<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD procedure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 shadow-sm py-4 mt-5 mb-3 border bg-success bg-opacity-50">
                <h2 class=text-center>CRUD Process</h2>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM user WHERE id='$id'";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                ?>
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" class="form-control mb-2" placeholder="Enter Username" name="name" value="<?php echo $row['name']; ?>">
                        <input type="text" class="form-control mb-2" placeholder="Enter Email" name="email" value="<?php echo $row['email']; ?>">
                        <button class="btn btn-dark">Update</button>
                    </form>
                <?php } else {
                ?>
                    <form action="insert.php" method="POST">
                        <input type="text" class="form-control mb-2" placeholder="Enter Username" name="name">
                        <input type="text" class="form-control mb-2" placeholder="Enter Email" name="email">
                        <button class="btn btn-dark">Create</button>
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="row mt-3">
            <table class="table table-bordered table-striped table-success">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Modified Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php

                $sql = "SELECT * FROM user";
                $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) { ?>

                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['created_date']; ?></td>
                        <td><?php echo $row['modified_date']; ?></td>
                        <td><a href="index.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr>

                <?php
                }
                ?>

            </table>
        </div>
    </div>
</body>

</html>