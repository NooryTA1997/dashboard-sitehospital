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
            <h3>เข้าสู่ระบบ</h3>
        </div>
        <hr>
        <form action="signup_db.php" method="post">
            <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);

                    ?>
            </div>

            <?php  } ?>
            <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);

                    ?>
            </div>

            <?php  } ?>
            <?php if (isset($_SESSION['warning'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['warning'];
                    unset($_SESSION['warning']);

                    ?>
            </div>

            <?php  } ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password </label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password </label>
                <input type="c_password" class="form-control" name="c_password">
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sing Up</button>
        </form>
        <hr>
        <p>ยังไม่เป็นสมาชิกแล้วใช่ไหม คลิ๊กที่นี้เพื่อ </p><a href="sigin.php">สมัครสมาชิก</a>
    </div>
</body>