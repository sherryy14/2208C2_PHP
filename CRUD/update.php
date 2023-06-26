<?php 
include 'header.php';
include 'config.php';
?>



<div class="container bg-body-tertiary py-3">
<h2 class="my-3">Edit Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="sid" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Show" name='show' class="btn btn-dark">
        </form>


        <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50 mt-5">
            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Your full name" autocomplete="off" required>
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="address" id="floatingPassword" placeholder="Your complete address" autocomplete="off" required>
            <label for="floatingPassword">Address</label>
        </div>
        <select class="form-select mb-3 w-50" name="class" aria-label="Default select example" required>
            <option selected disabled>Class</option>
            
        </select>
        <div class="form-floating mb-3 w-50">
            <input type="tel" class="form-control" name="phone" id="floatingPhone" placeholder="Your phone number" autocomplete="off" required>
            <label for="floatingPhone">Phone</label>
        </div>

        <input type="submit" value="Update" name='update' class="btn btn-dark">
    </form>
</div>



</div>
</body>
</html>