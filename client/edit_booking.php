<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <?php 

        require_once('config.php');

        $id = $_GET['id'];

        $query = "SELECT * FROM users WHERE id='$id'";

        $result = mysqli_query($conn,$query);

        $row = mysqli_fetch_assoc($result);

    ?>

    <div class="container">
        <div class="card mt-4" id="form-body">
            <div class="card-header">
                Update Data
            </div>
            <div class="card-body">
                <form method="post" action="update_data.php">
                    <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" value="<?php echo $row['fullname']; ?>" class="form-control" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" value="<?php echo $row['email']; ?>" class="form-control" name="email" placeholder="Enter Email">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>