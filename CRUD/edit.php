<?php
include 'header.php';
include 'config.php';

$id = $_GET['id'];

$fetch = "SELECT * FROM `record` WHERE id = '{$id}'";
$fetchResult = mysqli_query($conn,$fetch);


if(isset($_POST['update'])){
    $uid = $_POST['hidden'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $class = $_POST['class'];
    $phone = $_POST['phone'];


    $update = "UPDATE `record` SET name = '{$name}' , address = '{$address}' , class = '{$class}', phone = '{$phone}' WHERE id = '{$uid}'";
    $updateResult = mysqli_query($conn, $update);
    if($updateResult){
        header("Location: index.php");
    }else{
        echo "Error.";
    }
}
?>



<div class="container bg-body-tertiary py-3">
    <h2>Update Records</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">


    <?php 
    while($row = mysqli_fetch_array($fetchResult)){

   
    ?>
                <input type="hidden" class="form-control" name="hidden" value='<?php echo $row['id']?>'>

                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="name" value='<?php echo $row['name']?>' id="floatingInput" placeholder="Your full name" autocomplete="off">
                    <label for="floatingInput">Name</label>
                </div>
                <div class="form-floating mb-3 w-50">
                    <input type="text" class="form-control" name="address" value='<?php echo $row['address']?>' id="floatingPassword" placeholder="Your complete address" autocomplete="off">
                    <label for="floatingPassword">Address</label>
                </div>
                <select class="form-select mb-3 w-50" name="class" aria-label="Default select example" required>
                <option disabled> Class </option>
                <?php 
                    $class = "SELECT * FROM `class`";
                    $exec = mysqli_query($conn, $class);

                    while($crow = mysqli_fetch_array($exec)){

                        if($crow['cid'] == $row['class']){
                            $select = "selected";
                        }else{
                            $select = "";

                        }
                    ?>
                    
                    <option <?php echo $select;?>  value='<?php echo $crow['cid']?>'> <?php echo $crow['cname']?> </option>
                    

                   <?php  }?>

                   
                </select>


                <div class="form-floating mb-3 w-50">
                    <input type="tel" class="form-control" name="phone" value='<?php echo $row['phone']?>' id="floatingPhone" placeholder="Your phone number" autocomplete="off">
                    <label for="floatingPhone">Phone</label>
                </div>
                
                <?php  }?>

                <input type="submit" value="Update" name='update' class="btn btn-dark">

     
    </form>
</div>


</div>
</body>

</html>