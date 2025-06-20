<?php

session_start();
require_once 'config/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="col-12 mt-5">
            สมัครสมาชิก
        </div>
        <hr>
        <form action="signup_db.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" aria-describedby="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name </label>
                <input type="text" class="form-control" name="lastname" aria-describedby="lastname">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm password" class="form-label">Confirm Password </label>
                <input type="password" class="form-control" name="c_password">
            </div>
            <button type="submit" name="sigup" class="btn btn-primary">Sign Up</button>
        </form>
        <hr>
        <p>ยังไม่เป็นสมาชิกใช่ไหม คลิ๊กที่นี้เพื่อ </p><a href="index1.php">สมัครสมาชิก</a>
    </div>
</body>

</html>