<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: loginForm.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>แดชบอร์ด</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <h2>ยินดีต้อนรับ, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
                <a href="logout.php" class="btn btn-danger mt-3">ออกจากระบบ</a>
            </div>
        </div>
    </div>
</body>

</html>