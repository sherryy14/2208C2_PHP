<?php 
include 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Records App | AJAX</title>
</head>

<body class='bg-dark text-white'>
    <div class="container-fluid bg-secondary py-3">
        <h1 class="text-center text-white">Student Records App</h1>
    </div>
    <div class="container d-flex justify-content-center">
        <div id="liveAlertPlaceholder" class='w-25'></div>
    </div>
    <div class="container my-5">
        <form class="row g-3" id='form'>
            <div class="col-md-4">
                <label for="validationDefault01" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="validationDefault02" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" autocomplete="off">
            </div>
            <div class="col-md-4">
                <label for="validationDefault03" class="form-label">City</label>
                <input type="text" class="form-control" id="city" autocomplete="off">
            </div>


            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-light" id="btn" type="submit">Add Record</button>

            </div>
        </form>

        <div class="container my-3">
            <select id="cityFilter" class="form-control w-25">
                <option selected disabled>Filter By City</option>
                <?php 
                $city = "SELECT DISTINCT(city) FROM `ajax`";
                $res = mysqli_query($conn,$city);
                while($row = mysqli_fetch_assoc($res)){

                
                ?>
                <option value="<?php echo $row['city']?>"><?php echo $row['city']?></option>

                <?php }?>
            </select>
        </div>


        <table class="table table-dark table-hover table-striped mt-4 shadow-lg bg-body-tertiary rounded text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>

                </tr>
            </thead>
            <tbody id="data">

            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {

            // Add record 
            $('#btn').click(function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let city = $('#city').val();
                if (name !== '' && email !== '' && city !== '') {

                    $.ajax({
                        url: 'addRecord.php',
                        type: "POST",
                        data: {
                            stdName: name,
                            stdEmail: email,
                            stdCity: city,
                        }
                    })
                    $('#form').trigger('reset')
                    fetch();
                }else{
                    alert("Insert data")
                }
            });

            // Fetch record 

            function fetch() {
                $.ajax({
                    url: 'fetch.php',
                    type: "post",
                    success: function(record) {
                        $('#data').html(record)
                    }
                })
            }
            fetch();

            // City Filter


           $('#cityFilter').change(function(){
            let city = $(this).val();

            $.ajax({
                url: "cityFilter.php",
                type: "POST",
                data: {
                    cityVal : city
                },
                success:function(fetch){
                    $('#data').html(fetch)
                }
            })
           })
        })
    </script>
</body>

</html>