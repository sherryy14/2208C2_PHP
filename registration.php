<?php 

    $conn = mysqli_connect('localhost','root','','formC2');

    if(isset($_POST['submit'])){

        $name = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $cnic = $_POST['cnic'];

        $query = "INSERT INTO `registration` ( `name`, `email`, `address`, `gender`, `age`, `phone`, `cnic`) VALUES ( '$name', '$email', '$address', '$gender', '$age', '$phone', '$cnic')";

        $result = mysqli_query($conn, $query);

        if($result){
            echo "
            <script>
                alert('Form Has Been Submitted')
            </script>";

        //     echo "<script>
        //     window.location.href = 'form.php'
        // </script>";

            // header("Location: form.php");
        }
        
        
        
        // mysqli_query(mysqli_connect('localhost','root','','formC2'), "INSERT INTO `registration` ( `name`, `email`, `address`, `gender`, `age`, `phone`, `cnic`) VALUES ( '$name', '$email', '$address', '$gender', '$age', '$phone', '$cnic')");
    }


  

    

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">   
    <title>Registration</title>
</head>
<body>
    <div class="container">
    <form class="row g-3" method="post">
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="validationDefault01" name="fullname"  required>
  </div>

  
  <div class="col-md-6">
    <label for="validationDefault03" class="form-label">Email</label>
    <input type="text" class="form-control" id="validationDefault03"  name="email"  required>
  </div>

  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Address</label>
    <input type="text" class="form-control" id="validationDefault02"  name="address"   required>
  </div>

  <div class="form-check">
    
  <input class="form-check-input" type="radio" name="gender" value="M" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Male
  </label>
</div>
  <div class="form-check">
    
  <input class="form-check-input" type="radio" name="gender" value="F" id="flexRadioDefault2">
  <label class="form-check-label" for="flexRadioDefault2" >
    Female
  </label>
</div>
 
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Age</label>
    <input type="text" class="form-control" id="validationDefault05"  name="age"  required>
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">Phone</label>
    <input type="text" class="form-control" id="validationDefault05"  name="phone"  required>
  </div>
  <div class="col-md-3">
    <label for="validationDefault05" class="form-label">CNIC</label>
    <input type="text" class="form-control" id="validationDefault05"  name="cnic"  required>
  </div>

  <div class="col-12">
    <button class="btn btn-primary" type="submit" name="submit">Submit Form</button>
  </div>
</form>
    </div>


    <div class="container">
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Age</th>
          <th>Phone</th>
          <th>CNIC</th>
        </tr>

        <?php 
         
    $fetch = "SELECT * FROM `registration`";
    $fetchResult = mysqli_query($conn, $fetch);
          while( $noOfUSers = mysqli_fetch_array($fetchResult)){
        ?>
        <tr>
        <td><?php echo $noOfUSers['id']?></td>
        <td><?php echo $noOfUSers[1]?></td>
        <td><?php echo $noOfUSers['email']?></td>
        <td><?php echo $noOfUSers['gender']?></td>
        <td><?php echo $noOfUSers['address']?></td>
        <td><?php echo $noOfUSers['age']?></td>
        <td><?php echo $noOfUSers['phone']?></td>
        <td><?php echo $noOfUSers['cnic']?></td>
        <tr>
        </tr>
        <?php }?>
        
      </table>
    </div>

</body>
</html>