<?php
include "connect.php";

if (isset($_POST['submit'])) {
  $ID = $_POST['ID'];
  $Name = $_POST['first-name'];
  $Age = $_POST['Age'];
  $Address = $_POST['address'];
  $ContactNum = $_POST['contact'];



  $stmt = $conn->prepare("UPDATE crud_db SET Name = ?, Age = ?, Address = ?, ContactNum = ? WHERE ID = ?");
  $stmt->bind_param("sisii", $Name, $Age, $Address, $ContactNum, $ID);

  if ($stmt->execute()) {
    header("Location: index.php?msg=Record updated successfully");
    exit();
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
}
