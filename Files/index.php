<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method='post' enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" class="form-control" name="image" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <input type="submit" value="Upload" name="upload" class="btn btn-primary">
        </form>
    </div>
</body>
</html>

<?php 

if(isset($_POST['upload'])){
    $image = $_FILES['image'];
    echo "<pre>";
    print_r($image);
    echo "</pre>";

    $temp_name = $image['tmp_name'];
    $img_name = $image['name'];
    $img_size = $image['size'];


    echo $image['tmp_name'];
    if($img_size < 1000000){
        move_uploaded_file($temp_name, "images/$img_name");
        echo "<h2 class='text-success'>Image has been uploaded</h2>";
    }else{
        echo "<h2 class='text-danger'>Image size must be less than 1mb</h2>";
    }

    echo "<img src='images/$img_name' width='200' height='200'>";
}

?>