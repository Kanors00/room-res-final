<?php
ob_start();
include "connect.php";

// Handle Add or Update
if (isset($_POST['submit'])) {
  $Name = $_POST['first-name'];
  $Age = $_POST['Age'];
  $Address = $_POST['address'];
  $ContactNum = $_POST['contact'];

  if (isset($_POST['ID_1']) && !empty($_POST['ID_1'])) {
    $ID = $_POST['ID_1'];
    $stmt = $conn->prepare("UPDATE crud_db SET Name = ?, Age = ?, Address = ?, ContactNum = ? WHERE ID = ?");
    $stmt->bind_param("sisii", $Name, $Age, $Address, $ContactNum, $ID);
    $stmt->execute();
    header("Location: index.php?msg=Record updated successfully");
    exit();
  } else {
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
  <title>CRUD App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <script src="https://cdn.lordicon.com/lordicon.js"></script>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5 text-white bg-primary">
    CRUD SAMPLE
  </nav>

  <div class="container">
    <?php if (isset($_GET["msg"])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET["msg"]) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Search Form -->
    <form method="GET" class="search-form d-flex justify-content-center mb-5">
      <div class="input-group w-50 shadow-sm">
        <input type="text" name="search" class="form-control border-0 rounded-start-pill"
          placeholder="🔍 Search by name or address"
          value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit" class="btn btn-primary rounded-end-pill">
          <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="hover" colors="primary:#ffffff" style="width:24px;height:24px"></lord-icon> Search
        </button>
      </div>
    </form>

    <div class="row">
      <?php
      $searchQuery = "";
      if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $searchQuery = "WHERE Name LIKE '%$search%' OR Address LIKE '%$search%'";
      }

      $result = mysqli_query($conn, "SELECT * FROM crud_db $searchQuery");
      while ($row = mysqli_fetch_assoc($result)):
      ?>
        <div class="col-md-4 mb-4">
          <div class="card shadow-sm h-100">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
              <h6 class="mb-0"><?= strtoupper($row["Name"]) ?></h6>
              <span class="badge bg-light text-dark">ID: <?= $row["ID"] ?></span>
            </div>
            <div class="card-body">
              <p class="card-text mb-3">
                <b>Age:</b> <?= $row["Age"] ?><br>
                <b>Address:</b> <?= strtoupper($row["Address"]) ?><br>
                <b>Contact:</b> <?= $row["ContactNum"] ?>
              </p>
              <div class="d-flex justify-content-end gap-2">
                <button class="btn btn-outline-primary btn-sm editBtn"
                  data-bs-toggle="modal" data-bs-target="#confirmEditModal"
                  data-id="<?= $row['ID'] ?>"
                  data-name="<?= htmlspecialchars($row['Name']) ?>"
                  data-age="<?= $row['Age'] ?>"
                  data-address="<?= htmlspecialchars($row['Address']) ?>"
                  data-contact="<?= $row['ContactNum'] ?>">
                  <lord-icon src="https://cdn.lordicon.com/wloilxuq.json" trigger="hover" colors="primary:#0d6efd" style="width:24px;height:24px"></lord-icon> Edit
                </button>
                <button class="btn btn-outline-danger btn-sm"
                  data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                  data-id="<?= $row['ID'] ?>">
                  <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="hover" colors="primary:#dc3545" style="width:24px;height:24px"></lord-icon> Delete
                </button>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <!-- Floating Add Button -->
    <button class="fab" data-bs-toggle="modal" data-bs-target="#addDataModal">
      <lord-icon src="https://cdn.lordicon.com/ynwbvguu.json" trigger="hover" colors="primary:#ffffff" style="width:30px;height:30px"></lord-icon>
    </button>

    <!-- Add Modal -->
    <div class="modal fade" id="addDataModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST">
            <div class="modal-header">
              <h5 class="modal-title">
                <lord-icon src="https://cdn.lordicon.com/lomfljuq.json" trigger="loop" colors="primary:#0d6efd" style="width:24px;height:24px"></lord-icon> Add New Record
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-3" name="first-name" placeholder="Full Name" required>
              <input type="number" class="form-control mb-3" name="Age" placeholder="Age" required>
              <input type="text" class="form-control mb-3" name="address" placeholder="Address" required>
              <input type="text" class="form-control mb-3" name="contact" placeholder="Contact Number" required>
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-outline-success">Save</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="confirmEditModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST">
            <div class="modal-header">
              <h5 class="modal-title">
                <lord-icon src="https://cdn.lordicon.com/zfzufhzk.json" trigger="loop" colors="primary:#0d6efd" style="width:24px;height:24px"></lord-icon>
                Edit Record
              </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-3" id="editName" name="first-name" placeholder="Full Name">
              <input type="number" class="form-control mb-3" id="editAge" name="Age" placeholder="Age">
              <input type="text" class="form-control mb-3" id="editAddress" name="address" placeholder="Address">
              <input type="text" class="form-control mb-3" id="editContact" name="contact" placeholder="Contact Number">
              <input type="hidden" name="ID_1" id="editId">
            </div>
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn-outline-success">Update</button>
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="GET" action="delete.php">
            <div class="modal-header">
              <h5 class="modal-title">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#dc3545" style="width:24px;height:24px"></lord-icon>
                Confirm Deletion
              </h5>
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

    <!-- JavaScript for Modal Data Binding -->
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

      const deleteModal = document.getElementById('confirmDeleteModal');
      deleteModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        document.getElementById('deleteId').value = id;
      });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</body>

</html>