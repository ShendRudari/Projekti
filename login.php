<?php
session_start();

require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "projektii");
$userManager = new Crud\User($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email=? AND password=?";
    $stmt = $database->prepare($sql);
    $database->bind($stmt, "ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row) {
            if ($row["role"] == "user") {
                $_SESSION["email"] = $email;
                header("location:index.php");
            } elseif ($row["role"] == "admin") {
                $_SESSION["email"] = $email;
                header("location:admin.php");
            } else {
                echo "Email or password incorrect";
            }
        } else {
            echo "Email or password incorrect";
        }
    } else {
        echo "Error: Unable to execute query";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
   <div class="login">
    <h2>Login</h2>

    <form method="post" onsubmit="return validationForm()">
        <div class="user email">
            <input id="email" type="email" name="email" placeholder="example@gmail.com">
        </div>

        <div class="user password">
            <input id="password" type="password" name="password" placeholder="Password">
        </div>

        <button type="submit">Submit</button>
    </form>
    </div>
    <script>
        function validationForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address!');
                return false;
            }
            
            if (password.length < 6) {
                alert('Password must be at least 6 characters!');
                return false;
            }
            
            return true;
        }
    </script>
</body>
</html>
