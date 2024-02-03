<?php
session_start();

require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "projektii");
$userManager = new Crud\User($database);

if (!$userManager->isAdmin()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $userManager->deleteUser($user_id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>

<header class="header">
    <!-- Header content remains the same -->
</header>

<section id="adminPanel">
    <div class="container">
        <h1>Admin Panel</h1>

        <?php
        $users = $userManager->getAllUsers();

        if (!empty($users)) {
            echo "<table border='1'>";
            echo "<thead><tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Actions</th></tr></thead>";
            echo "<tbody>";
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['id']}</td>";
                echo "<td>{$user['username']}</td>";
                echo "<td>{$user['email']}</td>";
                echo "<td>{$user['role']}</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='user_id' value='{$user['id']}'>";
                echo "<button type='submit' name='delete_user'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No users found.</p>";
        }
        ?>
    </div>
</section>

<!-- Rest of your HTML content remains the same -->

</body>
</html>
