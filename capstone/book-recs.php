<?php
include "admin_conn.php";
include "head.php";
include "handle.php";
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include "includes/navbar.php"; ?>
    <?php include "includes/sidebar.php"; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <h2 class="text-center">Library Book Records</h2>
          <?php if (isset($error)): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <table id="booksTable" class="table table-striped table-bordered text-center">
                <thead class="table-light">
                  <tr>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Count</th>
                    <th>Remaining</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $modals = '';
                  if (isset($conn) && $conn) {
                    $result = $conn->query("SELECT * FROM books ORDER BY BookID DESC");
                    if ($result) {
                      while ($row = $result->fetch_assoc()) {
                        $status = ($row['Remaining'] > 0)
                          ? "<span class='badge bg-success'>Available</span>"
                          : "<span class='badge bg-danger'>Out</span>";

                        echo "<tr>
                          <td>{$row['BookID']}</td>
                          <td>" . htmlspecialchars($row['Title']) . "</td>
                          <td>" . htmlspecialchars($row['Author']) . "</td>
                          <td>" . htmlspecialchars($row['Category']) . "</td>
                          <td>{$row['Count']}</td>
                          <td>{$row['Remaining']}</td>
                          <td>$status</td>
                          <td>
                            <button class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal{$row['BookID']}'><i class='fas fa-edit'></i></button>
                            <a href='?delete={$row['BookID']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Delete this record?\")'><i class='fas fa-trash'></i></a>
                          </td>
                        </tr>";

                        $modals .= "
                        <div class='modal fade' id='editModal{$row['BookID']}' tabindex='-1'>
                          <div class='modal-dialog modal-dialog-centered'>
                            <div class='modal-content'>
                              <form method='POST'>
                                <div class='modal-header bg-primary text-white'>
                                  <h5 class='modal-title'>Edit Book</h5>
                                  <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                </div>
                                <div class='modal-body'>
                                  <input type='hidden' name='BookID' value='{$row['BookID']}'>
                                  <input type='text' name='title' class='form-control mb-2' value='" . htmlspecialchars($row['Title']) . "' required>
                                  <input type='text' name='author' class='form-control mb-2' value='" . htmlspecialchars($row['Author']) . "' required>
                                  <input type='text' name='category' class='form-control mb-2' value='" . htmlspecialchars($row['Category']) . "' required>
                                  <input type='number' name='count' class='form-control mb-2' value='{$row['Count']}' required>
                                  <input type='number' name='remaining' class='form-control mb-2' value='{$row['Remaining']}' required>
                                </div>
                                <div class='modal-footer'>
                                  <button type='submit' name='edit' class='btn btn-success'>Update</button>
                                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>";
                      }
                    } else {
                      echo "<tr><td colspan='8' class='text-center'>No records found or error: " . $conn->error . "</td></tr>";
                    }
                  } else {
                    echo "<tr><td colspan='8' class='text-center'>Database connection failed.</td></tr>";
                  }
                  ?>
                </tbody>
              </table>
              <?= $modals ?>
              <div class="text-center mt-3">
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i> Add New Book</button>
              </div>
              <div class="text-center mt-3">
                <form method="POST" onsubmit="return confirm('Are you sure you want to delete ALL book records? This action cannot be undone.')">
                  <button type="submit" name="delete_all" class="btn btn-outline-danger">
                    <i class="fas fa-trash-alt"></i> Delete All Data
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form method="POST">
            <div class="modal-header bg-success text-white">
              <h5 class="modal-title">Add Book</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="text" name="title" class="form-control mb-2" placeholder="Title" required>
              <input type="text" name="author" class="form-control mb-2" placeholder="Author" required>
              <input type="text" name="category" class="form-control mb-2" placeholder="Category" required>
              <input type="number" name="count" class="form-control mb-2" placeholder="Total Copies" required>
              <input type="number" name="remaining" class="form-control mb-2" placeholder="Remaining Copies" required>
            </div>
            <div class="modal-footer">
              <button type="submit" name="add" class="btn btn-success">Save</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>

  <!-- jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <!-- Bootstrap 5 JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE JS -->
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <?php include "includes/datatable-scripts.php"; ?>
  <script src="script.js"></script>
</body>

</html>