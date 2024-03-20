<?php
require_once 'functions.php';
$conn = connectDatabase();

$user = ['id' => '', 'emri' => '', 'email' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];

    if (!empty($id) && !empty($name) && !empty($email) && !empty($newPassword)) {
        if (updateUser($conn, $id, $name, $email) && updatePassword($conn, $id, $newPassword)) {
            echo "Success!";
            header("Location: ../AdminDashboard.php");
            exit();
        } else {
            echo "Error, please try again.";
        }
    } else {
        echo "Please fill all the fields!";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = getUserById($conn, $id);
    if (!$user) {
        echo "User not found!";
        exit();
    }
} else {
    echo "No ID given to the user.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="edituser.css">
</head>
<body>
    <h2>Edit User</h2>
    <div class="edit-container">
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $user['emri']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" required>
            </div>
            <input type="submit" name="submit" value="Save Changes" class="btn-save">
        </form>
    </div>
</body>
</html>