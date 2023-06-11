<?php
    if(!isset($_GET['id'])){
        // redirect to show page
        die('id not provided');
    }
    require_once('checkdata.php');
    $id =  $_GET['id'];
    $sql = "SELECT * FROM `user1` where id = $id";
    $result = $con->query($sql);
    if($result->num_rows != 1){
        // redirect to show page
        die('id is not in db');
    }
    $data = $result->fetch_assoc();
    print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron">
        <h1 class="text-center">
            Product Company
        </h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <form method="POST">
                <h3>Edit Form</h3>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="pname" id="username" value="<?= $data['username']?>">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="pprice" id="email" value="<?= $data['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="pdescription" id="masjidname" cols="30" rows="10"><?= $data['masjidname']?></textarea>
                    </div>

                    <input type="submit" name="editForm" value="submit" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
</body>
</html>

