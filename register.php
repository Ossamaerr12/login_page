<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // تشفير كلمة المرور
    echo "Hashed password: " . $password; // إضافة هذه السطر بعد التشفير


    $query = "INSERT INTO users (name, username, password) VALUES ('$name', '$username', '$password')";
    if ($conn->query($query) === TRUE) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
   <h1>Register</h1>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
   </div>
</body>
</html>
