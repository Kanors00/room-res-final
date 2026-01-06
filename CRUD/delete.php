<?php
include "connect.php";

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "DELETE FROM crud_db WHERE id=$ID";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header(header: "Location: index.php?msg=Record Delete Successfully");
        exit();
    }
}
?>

