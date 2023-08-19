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
        <h2 class="text-center bg-secondary my-3 py-2  rounded">Filter</h2>

        <div class="container my-3">
            <div class="row">

                <div class="col-md-4">
                    <select id="nameFilter" class="form-control">
                        <option disabled selected>Sort By Name</option>
                        <option value="ASC">Name, A to Z</option>
                        <option value="DESC">Name, Z to A</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select id="cityFilter" class="form-control">
                        <option disabled selected>Sort By City</option>
                        <?php
                        $conn = mysqli_connect("localhost", "root", '', '2208c2');

                        $city = "SELECT DISTINCT(city) FROM `records` ";
                        $res = mysqli_query($conn, $city);
                        while ($row = mysqli_fetch_array($res)) {


                        ?>
                            <option value="<?php echo $row['city'] ?>"> <?php echo ucwords($row['city']) ?> </option>

                        <?php  } ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <select id="idFilter" class="form-control">
                        <option disabled selected>Sort By ID</option>
                        <option value="ASC">ID, Low to High</option>
                        <option value="DESC">ID, High to Low</option>
                    </select>
                </div>


                <div class="col-md-4 my-2">
                    <input type="date" class="form-control" id="date" autocomplete="off">
                </div>
                <div class="col-md-4 my-2">
                    <input type="text" class="form-control" id="searchName" autocomplete="off" placeholder="Enter Name">
                </div>
                <div class="col-md-4 my-2">
                    <input type="text" class="form-control" id="searchEmail" autocomplete="off" placeholder="e.g. @gmail">
                </div>

            </div>

        </div>

        <table class="table table-dark table-hover table-striped mt-4 shadow-lg bg-body-tertiary rounded text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Date</th>
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
            // fetch data 

            function render() {
                $.ajax({
                    url: "fetch.php",
                    type: "POST",
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            }
            render();

            // insert data 
            $("#btn").click(function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let city = $('#city').val();

                if (name !== '' && email !== '' && city !== '') {

                    $.ajax({
                        url: "add.php",
                        type: "POST",
                        data: {
                            stdName: name,
                            stdEmail: email,
                            stdCity: city
                        }
                    })
                    $("#form").trigger('reset');

                    render()
                } else {
                    alert("Please insert data")
                }
                render()
            })

            // Name Filter 

            $("#nameFilter").change(function() {
                let nameFilter = $(this).val();
                // console.log(typeof nameFilter);

                $.ajax({
                    url: "nameFilter.php",
                    type: "POST",
                    data: {
                        nameVal: nameFilter
                    },
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            })
            // Search Name 

            $("#searchName").keyup(function() {
                let nameSeacrh = $(this).val();
                console.log(nameSeacrh);

                $.ajax({
                    url: "nameSeacrh.php",
                    type: "POST",
                    data: {
                        name: nameSeacrh
                    },
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            })
            // Date Filter

            $("#date").change(function() {
                let dateFilter = $(this).val();

                console.log(dateFilter);

                $.ajax({
                    url: "dateFilter.php",
                    type: "POST",
                    data: {
                        dateVal: dateFilter
                    },
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            })
            // City Filter 

            $("#cityFilter").change(function() {
                let cityFilter = $(this).val();

                console.log(cityFilter);

                $.ajax({
                    url: "cityFilter.php",
                    type: "POST",
                    data: {
                        cityVal: cityFilter
                    },
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            })

            // Search Email 

            $("#searchEmail").keyup(function() {
                let searchEmail = $(this).val();

                console.log(searchEmail);

                $.ajax({
                    url: "searchEmail.php",
                    type: "POST",
                    data: {
                        emailVal: searchEmail
                    },
                    success: function(users) {
                        $("#data").html(users)
                    }
                })
            })



        })

        // Alter Script Bootstrap 

        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('btn')
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert('Nice, your record has been inserted!', 'success')
            })
        }

    </script>
</body>

</html>