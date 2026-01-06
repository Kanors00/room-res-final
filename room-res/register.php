<?php
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fullName = trim($_POST['fName']);
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  $role = 'user'; // Force role to 'user' regardless of input

  // Password check
  if ($password !== $confirmPassword) {
    echo "<script>
      alert('Passwords do not match.');
      window.location.href = 'index.php?register=failed&reason=password_mismatch';
    </script>";
    exit;
  }

  // Check if email exists
  $checkEmail = $conn->prepare("SELECT id FROM users WHERE email = ?");
  $checkEmail->bind_param("s", $email);
  $checkEmail->execute();
  $checkEmail->store_result();

  if ($checkEmail->num_rows > 0) {
    echo "<script>
      alert('Email is already taken. Please use another one.');
      window.location.href = 'index.php?register=failed&reason=email_exists';
    </script>";
    exit;
  }

  // Check if username exists
  $checkUser = $conn->prepare("SELECT id FROM users WHERE username = ?");
  $checkUser->bind_param("s", $username);
  $checkUser->execute();
  $checkUser->store_result();

  if ($checkUser->num_rows > 0) {
    echo "<script>
      alert('Username is already taken. Please choose another.');
      window.location.href = 'index.php?register=failed&reason=username_exists';
    </script>";
    exit;
  }

  // Insert new user
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password_hash, role) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("sssss", $fullName, $username, $email, $hashedPassword, $role);

  if ($stmt->execute()) {
    header("Location: index.php?register=success");
    exit;
  } else {
    echo "<script>
      alert('Registration failed due to a server error.');
      window.location.href = 'index.php?register=failed&reason=error';
    </script>";
    exit;
  }
}
?>
