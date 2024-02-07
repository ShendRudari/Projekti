<?php
function connectDatabase()
{
    $servername = "localhost";
    $dbname = "projektiii";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed! " . $e->getMessage();
        return null;
    }
}

function getUsers($conn)
{
    try {
        $stmt = $conn->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error " . $e->getMessage();
        return [];
    }
}

function addUser($conn, $emri, $email, $password)
{
    try {
        $stmt = $conn->prepare("INSERT INTO users (emri, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$emri, $email, $password]);
    } catch (PDOException $e) {
        echo "Failed to add users " . $e->getMessage();
        return false;
    }
}

function updateUser($conn, $id, $emri, $email)
{
    try {
        $stmt = $conn->prepare("UPDATE users SET emri=?, email=? WHERE id=?");
        return $stmt->execute([$emri, $email, $id]);
    } catch (PDOException $e) {
        echo "Failed to edit user!: " . $e->getMessage();
        return false;
    }
}

function getUserById($conn, $id) {
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error!: " . $e->getMessage();
        return null;
    }
}

function updatePassword($conn, $id, $password) {
    try {
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        return $stmt->execute([$password, $id]);
    } catch (PDOException $e) {
        echo "Failed to edit password! " . $e->getMessage();
        return false;
    }
}

function getUserByEmailAndPassword($conn, $email, $password) {
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error! " . $e->getMessage();
        return null;
    }
}
function deleteUser($conn, $id) {
    try {
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo "Failed to delete the User " . $e->getMessage();
        return false;
    }
}
?>