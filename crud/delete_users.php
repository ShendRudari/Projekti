<?php
include 'functions.php';

$conn = connectDatabase();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteUser($conn, $id)) {
        header("location:AdminDashboard.php");
        exit();
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
} else {
    echo "Error: No user ID specified.";
}

?>
