<?php
if(isset($_POST["submit"]))
{
    if(!isset($_POST["love_name"])||empty($_POST["love_name"]))
    {
        ?>
            <script>alert("Love name Required")</script>
        <?php
        exit;
    }
    if(!isset($_FILES["love_image"])||empty($_FILES["love_image"]['name']))
    {
        ?>
            <script>alert("Love photo Required")</script>
        <?php
        exit;
    }
    $love_name = $_POST["love_name"];
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["love_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["love_image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["love_image"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" ) {
        echo "Sorry, only JPG Photos are allowed.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        $temp = explode(".", $_FILES["love_image"]["name"]);
        $newfilename = $target_dir.$love_name .'.' . end($temp);
        // echo $newfilename;exit;
        if (move_uploaded_file($_FILES["love_image"]["tmp_name"], $newfilename)) {
            header('Location: http://localhost/mytest/heart.php');
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        body{
            width:100%;
            height:100vh;
        }
        .box-main{
            width:100%;
            height:100vh;
            align-items: center;
            justify-content: center;
        }
        .box {
            justify-content: center;
        }

        .box div {
            width: 70px;
            height: 70px;
            margin :1px;
        }
        img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="d-flex box-main">
        <div class="item-main">
        <form name="add_images" action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="love_name">Enter Name*</label>
                <input type="text" class="form-control" name="love_name" id="love_name" aria-describedby="emailHelp" required placeholder="Enter email">
            </div>
            <br/><br/>
            <div class="form-group">
                <label for="love_image">Add Photo*</label><br/>
                <input type="file" required class="form-control-file" id="love_image" name= "love_image">
            </div>
            <br/><br/>
            <button type="submit" name="submit" class="btn btn-primary">Add Into My Heart</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>