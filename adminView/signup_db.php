<?php

session_start();
require_once 'config/dbconnect.php';

if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $urole = 'user';
}

if (empty($firstname)) {
    $_SESSION['error'] = 'กรุณากรอกชื่อ';
    header("location: index1.php");
} else if (empty($lastname)) {
    $_SESSION['error'] = 'กรุณากรอกนามสกุล';
    header("location: index1.php");
} else if (empty($email)) {
    $_SESSION['error'] = 'กรุณากรอกอีเมล';
    header("location: index1.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
    header("location: index1.php");
} else if (empty($password)) {
    $_SESSION['error'] = 'กรุณากรอรหัสผ่าน';
    header("location: index1.php");
} else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
    $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
    header("location: index1.php");
} else if (empty($c_password)) {
    $_SESSION['error'] = 'กรุณายืนยันรหัสผ่าน';
    header("location: index1.php");
} else if ($password != $c_password) {
    $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
    header("location: index1.php");
} else {

    try {

        $check_email = $conn->prepare("SELECT email FROM useradmin WHERE email = :email");
        $check_email->bindParam(":email", $email);
        $check_email->execute();
        $row = $check_email->fetch(PDO::FETCH_ASSOC);

        if ($row['email'] == $email) {
            $_SESSION['warning'] = "มีอีเมลนี้อยู่ในระบบแล้ว <a href='signup.php'>คลิ๊กที่นี้</a>เพื่อเข้าสู้ระบบ";
            header("location: index1.php");
        } else if (!isset($_SESSION['error'])) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO user(firstname, lastname, email, password, urole)
                                    VALUES(:firstname, lastname, email, :password, :urole)");

            $stmt->bindParam(":firstname", $firstname);
            $stmt->bindParam(":lastname", $lastname);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $passwordHash);
            $stmt->bindParam(":urole", $urole);
            $stmt->execute();
            $_SESSION['success'] = "สมัครสมาชิกเรียบร้อย! <a href='sigin.php' class='alert-link'>คลิ๊กที่นี้เพื่อเข้าสู่ระบบ</a>";
            header("location: index1.php");
        } else {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด";
            header("location: index1.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
