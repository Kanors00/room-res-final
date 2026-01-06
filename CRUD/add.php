<?php
include "connect.php";

if (isset($_POST['submit'])) {
    $Name = $_POST['first-name'];
    $Age = $_POST['Age'];
    $Address = $_POST['address'];
    $ContactNum = $_POST['contact'];

    $sql = "INSERT INTO crud_db (id, Name, Age, Address, ContactNum) VALUES (NULL, '$Name','$Age','$Address','$ContactNum')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAMPLE CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>


<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        <h3>CRUD SAMPLE</h3>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>ADD DATA</h3>
        </div>

        <style>
            input::placeholder {
                color: #cccccc;
            }

            nav {
                color: white;
            }

            .text-center h3 {
                color: white;
            }

            body {
                display: relative;
                background-image: url(photo.jfif);

            }

            .row {

                border-radius: 40px;
                z-index: 2;
                padding: 20px;
                margin: 10px;
                box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            }

            .col {
                color: #ffffffff;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: medium;
                padding-top: 20px;
            }

            .justify-content-center {
                display: flex;
                justify-content: space-between;
                gap: 25px;
            }

            .btn-danger {
                border-radius: 50px;
                padding-left: 20px;
                padding-right: 20px;
                width: 20vh;
            }

            .btn-success {
                border-radius: 50px;
                padding-left: 20px;
                padding-right: 20px;
                width: 20vh;
            }

            .form-control {
                border-radius: 50px;
                opacity: 0.7;
            }
        </style>

        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <form action="" method="POST" style="width: 50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="first-name" placeholder="Input your name">

                        <div class="col">
                            <label class="form-label">Age:</label>
                            <input type="text" class="form-control" name="Age" placeholder="Input your Age">

                            <div class="col">
                                <label class="form-label">Address:</label>
                                <input type="text" class="form-control" name="address" placeholder="Input your address">

                                <div class="col">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="contact" placeholder="Input your contact number">
                                    <br>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success" name="submit">Save</button>
                                        <a href="index.php" name="cancel" class="btn btn-danger">Cancel</a>
                                    </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>