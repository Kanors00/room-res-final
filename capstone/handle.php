<?php
// Handle Add
if (isset($_POST['add'])) {
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $count = intval($_POST['count']);
    $remaining = intval($_POST['remaining']);

    $stmt = $conn->prepare("INSERT INTO books (Title, Author, Category, Count, Remaining) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $title, $author, $category, $count, $remaining);

    if ($stmt->execute()) {
        header("Location: book-recs.php");
        exit();
    } else {
        $error = "Error adding book: " . $conn->error;
    }
    $stmt->close();
}

// Handle Edit
if (isset($_POST['edit'])) {
    $bookID = intval($_POST['BookID']);
    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $category = trim($_POST['category']);
    $count = intval($_POST['count']);
    $remaining = intval($_POST['remaining']);

    $stmt = $conn->prepare("UPDATE books SET Title = ?, Author = ?, Category = ?, Count = ?, Remaining = ? WHERE BookID = ?");
    $stmt->bind_param("sssiii", $title, $author, $category, $count, $remaining, $bookID);

    if ($stmt->execute()) {
        header("Location: book-recs.php");
        exit();
    } else {
        $error = "Error updating book: " . $conn->error;
    }
    $stmt->close();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $bookID = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM books WHERE BookID = ?");
    $stmt->bind_param("i", $bookID);

    if ($stmt->execute()) {
        header("Location: book-recs.php");
        exit();
    } else {
        $error = "Error deleting book: " . $conn->error;
    }
    $stmt->close();
}

// Handle Delete All
if (isset($_POST['delete_all'])) {
    $deleteAllQuery = "DELETE FROM books";
    if ($conn->query($deleteAllQuery)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        $error = "Failed to delete all records: " . $conn->error;
    }
}
