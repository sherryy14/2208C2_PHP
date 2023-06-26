<?php
include 'header.php';
include 'config.php';
?>


<div class="container bg-body-tertiary py-3">
    <h2 class="my-3">Delete Record</h2>
    <form action="" method="post" class="d-flex justify-content-center flex-column align-items-center">
        <div class="form-floating mb-3 w-50">
            <input type="text" class="form-control" name="sid" id="floatingInput" placeholder="Your ID" autocomplete="off" required>
            <label for="floatingInput">ID</label>
        </div>
        <input type="submit" value="Delete" name='delete' class="btn btn-dark">
    </form>

</div>
</div>
</body>

</html>