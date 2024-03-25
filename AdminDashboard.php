<?php
session_start();

require_once 'crud/functions.php';
$conn = connectDatabase();


if(isset($_POST['logout'])) {
    $_SESSION = array(); 
    session_destroy(); 
    header("Location: index.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['emri']) && isset($_POST['email']) && isset($_POST['password'])) {
        $emri = $_POST['emri'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        addUser($conn, $emri, $email, $password);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admindashboard.css">
    <title>Admin Dashboard</title>
    <style>
        .logout-btn {
            position: absolute;
            bottom: 10px;
            right: 5px;
            background: none;
            border: none;
            color: #000; 
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Logout button -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="logout-btn">
        <input type="submit" name="logout" value="Logout">
    </form>

    <h2>User Management</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        $users = getUsers($conn);
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . $user['id'] . "</td>";
            echo "<td>" . $user['emri'] . "</td>";
            echo "<td>" . $user['email'] . "</td>";
            echo "<td>" . $user['password'] . "</td>";
            echo "<td><a href='crud/edit_users.php?id=" . $user['id'] . "' class='edit-btn'>Edit</a></td>";
            echo "<td><a href='crud/delete_users.php?id=" . $user['id'] . "' class='delete-btn'>Delete</a></td>";

            echo "</tr>";
        }
        ?>
    </table>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="emri">Name:</label>
        <input type="text" id="emri" name="emri" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
