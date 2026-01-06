<?php
ob_start(); 
include "connect.php"; 
$ID = $_GET['ID'];
if (isset($_POST['submit'])) {
    $Name = $_POST['first-name'];
    $Age = $_POST['Age'];
    $Address = $_POST['address'];
    $ContactNum = $_POST['contact'];

    $sql = "UPDATE `crud_db` SET `Name`='$Name',Age='$Age',Address= '$Address',ContactNum='$ContactNum' WHERE ID=$ID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: index.php?msg=Update successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

// Fetch existing data
$sql = "SELECT * FROM crud_db WHERE ID = $ID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

ob_end_flush(); // Send buffered output
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Record</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('nature.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-color: black;
    }
    nav, .text-center h3 {
      color: white;
    }
    .row {
      border-radius: 40px;
      padding: 20px;
      margin: 10px;
      box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
      background-color: rgba(0, 0, 0, 0.6);
    }
    .col label {
      color: #cccccc;
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .form-control {
      border-radius: 50px;
      opacity: 0.85;
    }
    .btn {
      border-radius: 50px;
      width: 120px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    <h3>CRUD SAMPLE</h3>
  </nav>

  <div class="container">
    <div class="text-center mb-4">
      <h3>Edit User</h3>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 50vh;">
      <form action="" method="POST" style="width:50vw; min-width: 300px;">
        <div class="row">
          <div class="col mb-3">
            <label class="form-label">Full Name:</label>
            <input type="text" class="form-control" name="first-name" value="<?= $row['Name']; ?>" required>
          </div>

          <div class="col mb-3">
            <label class="form-label">Age:</label>
            <input type="text" class="form-control" name="Age" value="<?= $row['Age']; ?>" required>
          </div>

          <div class="col mb-3">
            <label class="form-label">Address:</label>
            <input type="text" class="form-control" name="address" value="<?= $row['Address']; ?>" required>
          </div>

          <div class="col mb-3">
            <label class="form-label">Contact Number:</label>
            <input type="text" class="form-control" name="contact" value="<?= $row['ContactNum']; ?>" required>
          </div>

          <div class="text-center mt-3">
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>