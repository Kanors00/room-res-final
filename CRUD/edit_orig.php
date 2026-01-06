<?php
ob_start();
include "connect.php";
$ID = $_GET['ID'];
if (isset($_POST['submit'])) {
    $Name = $_POST['first-name'];
    $Age = $_POST['Age'];
    $Address = $_POST['address'];
    $ContactNum = $_POST['contact'];

    $sql = "UPDATE `crud_db` SET `Name`='$Name',`Age`='$Age',`Address`= '$Address',`ContactNum`='$ContactNum' WHERE ID=$ID";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php?msg=Update successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
ob_end_flush();
?>

<?php
$sql = "SELECT * FROM `crud_db` WHERE ID = $ID LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SAMPLE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>


<body>

    <style>
        body {
            background-image: url(nature.jpg);
        }

        nav {
            color: white;
        }

        .text-center h3 {
            color: white;
        }

        body {
            background-color: black;
        }

        .row {
            border-radius: 40px;
            z-index: 2;
            padding: 20px;
            margin: 10px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;

        }

        .col {
            color: #cccccc;
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif;
            font-size: medium;
        }
    </style>


    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
        <h3>CRUD SAMPLE</h3>
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>SAMPLE EDIT USER</h3>
        </div>



        <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
            <form action="" method="POST" style="width:50vw; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="first-name" value="<?php echo $row['Name']; ?>">


                        <div class="col">
                            <label class="form-label">Age:</label>
                            <input type="text" class="form-control" name="Age" value="<?php echo $row['Age'] ?>">


                            <div class="col">
                                <label class="form-label">Address:</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $row['Address'] ?>">

                                <div class="col">
                                    <label class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" name="contact" value="<?php echo $row['ContactNum'] ?>">
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-success" name="submit">Update</button>
                                        <a href="index.php" class="btn btn-danger">Cancel</a>
                                    </div>

            </form>
        </div>
    </div>














    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>