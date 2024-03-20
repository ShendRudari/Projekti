<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("Location: news.php");
    exit();
}

require 'crud/functions.php';

$servername = "localhost";
$db = "projektiii";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (emri, email, password) VALUES (:emri, :email, :password)';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':emri', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $_SESSION['email'] = $email;
        header("Location: news.php");
        exit();
    } else {
        $message = "There is a problem creating this account!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>

<body>

    <div class="signup">
        <h2>Signup</h2>

        <form method="post">
            <div class="user name">
                <input type="text" name="name" placeholder="Name" required>
            </div>

            <div class="user email">
                <input type="email" name="email" placeholder="example@gmail.com" required>
            </div>

            <div class="user password">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="user confirm-password">
                <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
            </div>

            <button type="submit" name="submit">Signup</button>
        </form>
    </div>

</body>

</html>
