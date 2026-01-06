<?php
ob_start();
include "connect.php";
ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

 
  <title>CRUD</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    CRUD SAMPLE
  </nav>

  <div class="container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <style>
      .alert {
        background-color: rgba(63, 252, 113, 1);
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        max-width: 300px;
        transition: opacity 0.9s ease;
      }

      .btn {
        background-color: black;
      }

      body {
        background-image: url(beach.jpg);
      }

      .table {
        box-shadow: rgba(0, 0, 0, 0.45) 0px 25px 20px -20px;
      }
    </style>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Age</th>
          <th scope="col">Address</th>
          <th scope="col">Contact</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM crud_db";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["ID"] ?></td>
            <td><?php echo strtoupper(string: $row["Name"]) ?></td>
            <td><?php echo $row["Age"] ?></td>
            <td><?php echo strtoupper(string: $row["Address"]) ?></td>
            <td><?php echo $row["ContactNum"] ?></td>

            <td>
              <a href="edit.php?ID=<?php echo $row["ID"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>

              <a href="delete.php?ID=<?= $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete this record?');"
                class="link-dark">
                <i class="fa-solid fa-trash fs-5"></i>
              </a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <!--Button -->
    <div class="text-center mb-4">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataModal">
        Add Data
      </button>
    </div>
    <!-- Button -->

    <?php
    include "connect.php";

    if (isset($_POST['submit'])) {
      $Name = $_POST['first-name'];
      $Age = $_POST['Age'];
      $Address = $_POST['address'];
      $ContactNum = $_POST['contact'];

      $sql = "INSERT INTO crud_db (id, Name, Age, Address, ContactNum) VALUES (NULL, '$Name','$Age','$Address','$ContactNum')";

      $result = mysqli_query($conn, $sql);
    }


    ?>

    <!--- MODAL --->
    <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="addDataModalLabel">Add New Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="mb-3">
                <label class="form-label">Full Name:</label>
                <input type="text" class="form-control" name="first-name" placeholder="Input your name">
              </div>
              <div class="mb-3">
                <label class="form-label">Age:</label>
                <input type="text" class="form-control" name="Age" placeholder="Input your Age">
              </div>
              <div class="mb-3">
                <label class="form-label">Address:</label>
                <input type="text" class="form-control" name="address" placeholder="Input your address">
              </div>
              <div class="mb-3">
                <label class="form-label">Contact Number:</label>
                <input type="text" class="form-control" name="contact" placeholder="Input your contact number">
              </div>
            </div>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success" name="submit">Save</button>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>