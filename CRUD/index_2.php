<?php
ob_start();
include "connect.php";

if (isset($_POST['submit'])) {
  $Name = $_POST['first-name'];
  $Age = $_POST['Age'];
  $Address = $_POST['address'];
  $ContactNum = $_POST['contact'];


  if (isset($_POST['ID_1']) && !empty($_POST['ID_1'])) {
    // UPDATE
    $ID = $_POST['ID_1'];
    $stmt = $conn->prepare("UPDATE crud_db SET Name = ?, Age = ?, Address = ?, ContactNum = ? WHERE ID = ?");
    $stmt->bind_param("sisii", $Name, $Age, $Address, $ContactNum, $ID);
    $stmt->execute();
    header("Location: index.php?msg=Record updated successfully");
    exit();
  } else {
    // INSERT
    $stmt = $conn->prepare("INSERT INTO crud_db (Name, Age, Address, ContactNum) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sisi", $Name, $Age, $Address, $ContactNum);
    $stmt->execute();
    header("Location: index.php?msg=New record added successfully");
    exit();
  }
}
ob_end_flush();
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="style.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5 text-white">
    CRUD SAMPLE
  </nav>

  <div class="container">
    <?php if (isset($_GET["msg"])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars(string: $_GET["msg"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <div class="mb-4">
      <button type="button" class="btn btn-primary" 
        data-bs-toggle="modal" data-bs-target="#addDataModal">
      </i>
        Add Data
      </button>
    </div>

    <table class="table table-sm table-hover text-center table-striped-columns">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Age</th>
          <th>Address</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM crud_db");
        while ($row = mysqli_fetch_assoc($result)):
        ?>
          <tr>
            <td><?= $row["ID"] ?></td>
            <td><?= strtoupper($row["Name"]) ?></td>
            <td><?= $row["Age"] ?></td>
            <td><?= strtoupper($row["Address"]) ?></td>
            <td><?= $row["ContactNum"] ?></td>
            <td>
              <button class="btn btn-link editBtn"
                data-bs-target="#confirmEditModal"
                data-bs-toggle="modal"
                data-id="<?= $row['ID'] ?>"
                data-name="<?= htmlspecialchars($row['Name']) ?>"
                data-age="<?= $row['Age'] ?>"
                data-address="<?= htmlspecialchars($row['Address']) ?>"
                data-contact="<?= $row['ContactNum'] ?>">
                <i class='bx bxs-edit bx-fade-right-hover bx-sm'></i>
              </button>

              <button class="btn btn-link"
                data-bs-toggle="modal"
                data-bs-target="#confirmDeleteModal"
                data-id="<?= $row['ID'] ?>">
                <i class="bx bxs-trash bx-tada-hover box-lg">
                  </i>
              </button>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Add New Modal -->
  <div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sl">
      <div class="modal-content">
        <form method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Add New Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="first-name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Age</label>
              <input type="number" class="form-control" name="Age" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Address</label>
              <input type="text" class="form-control" name="address" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Contact Number</label>
              <input type="text" class="form-control" name="contact" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" class="btn btn-success">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Delete Modal -->
  <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="GET" action="delete.php">
          <div class="modal-header">
            <h5 class="modal-title">Confirm Deletion</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this record?
            <input type="hidden" name="ID" id="deleteId">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- EDIT MODAL -->
  <div class="modal fade" id="confirmEditModal" tabindex="-1" aria-labelledby="confirmEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST">
          <div class="modal-header">
            <h5 class="modal-title">Edit Records</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <div class="col">
              <label class="form-label">Full Name:</label>
              <input type="text" class="form-control" id="editName" name="first-name" placeholder="Input your name">

              <div class="col">
                <label class="form-label">Age:</label>
                <input type="text" class="form-control" id="editAge" name="Age" placeholder="Input your Age">

                <div class="col">
                  <label class="form-label">Address:</label>
                  <input type="text" class="form-control" id="editAddress" name="address" placeholder="Input your address">

                  <div class="col">
                    <label class="form-label">Contact Number</label>
                    <input type="text" class="form-control" id="editContact" name="contact" placeholder="Input your contact number"> <input type="hidden" name="ID_1" id="editId">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  </div>
        </form>
      </div>
    </div>
  </div>


  <script>
    const editModal = document.getElementById('confirmEditModal');
    editModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget;

      document.getElementById('editId').value = button.getAttribute('data-id');
      document.getElementById('editName').value = button.getAttribute('data-name');
      document.getElementById('editAge').value = button.getAttribute('data-age');
      document.getElementById('editAddress').value = button.getAttribute('data-address');
      document.getElementById('editContact').value = button.getAttribute('data-contact');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const deleteModal = document.getElementById('confirmDeleteModal');
    deleteModal.addEventListener('show.bs.modal', function(event) {
      const button = event.relatedTarget;
      const id = button.getAttribute('data-id');
      document.getElementById('deleteId').value = id;
    });
  </script>


</body>

</html>