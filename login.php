<?php
session_start();
require_once 'crud/functions.php';


if (isset ($_SESSION['logged_out']) && $_SESSION['logged_out'] === true) {
    unset($_SESSION['logged_out']);
    $error = "You have been logged out. Please log in again.";
}

$loggedIn = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = connectDatabase();

    if (!$conn) {
        echo "Error";
        exit();
    }

    $user = getUserByEmailAndPassword($conn, $email, $password);

    if ($user) {
        $loggedIn = true;


        unset($_SESSION['logged_out']);

        $role = $user['roli'];

        if ($role == 'admin') {
            $_SESSION['email'] = $email;
            header("Location: AdminDashboard.php");
            exit();
        } else {
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        }
    } else {
        $error = "Invalid email or password";
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

        <?php if (isset ($error)): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="post" onsubmit="return validationForm()">
            <div class="user email">
                <input id="email" type="email" name="email" placeholder="example@gmail.com" required>
            </div>

            <div class="user password">
                <input id="password" type="password" name="password" placeholder="Password" required>
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