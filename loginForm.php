<?php
session_start();

// ตัวอย่างข้อมูลล็อกอินแบบง่าย
$valid_username = "admin";
$valid_password = "123456"; // *** ควรเข้ารหัสด้วย password_hash ในระบบจริง

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f5f5f5;
    }

    .login-container {
        margin-top: 100px;
    }
    </style>
</head>

<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>เข้าสู่ระบบ</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST" action="loginForm.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>&copy; <?php echo date("Y"); ?> ระบบเข้าสู่ระบบ</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>