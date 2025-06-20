<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {

    $catname = $_POST['c_name'];

    $insert = mysqli_query($conn, "INSERT INTO login_form
         (username) 
         VALUES ('$username')");

    if (!$insert) {
        echo mysqli_error($conn);
        header("Location: ../index.php?category=error");
    } else {
        echo "Records added successfully.";
        header("Location: ../index.php?category=success");
    }
}
