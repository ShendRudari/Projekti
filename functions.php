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
        handleException($e);
        return null;
    }
}

function handleException($e)
{
    echo "Error: " . $e->getMessage();
}

function executeQuery($conn, $query, $params = [])
{
    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        handleException($e);
        return false;
    }
}

function getUsers($conn)
{
    $query = "SELECT * FROM users";
    $stmt = executeQuery($conn, $query);
    if ($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return [];
}

function addUser($conn, $emri, $email, $password)
{
    $query = "INSERT INTO users (emri, email, password) VALUES (?, ?, ?)";
    $params = [$emri, $email, $password];
    return executeQuery($conn, $query, $params);
}

function updateUser($conn, $id, $emri, $email)
{
    $query = "UPDATE users SET emri=?, email=? WHERE id=?";
    $params = [$emri, $email, $id];
    return executeQuery($conn, $query, $params);
}

function getUserById($conn, $id)
{
    $query = "SELECT * FROM users WHERE id=?";
    $params = [$id];
    $stmt = executeQuery($conn, $query, $params);
    if ($stmt) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

function updatePassword($conn, $id, $password)
{
    $query = "UPDATE users SET password=? WHERE id=?";
    $params = [$password, $id];
    return executeQuery($conn, $query, $params);
}

function getUserByEmailAndPassword($conn, $email, $password)
{
    $query = "SELECT * FROM users WHERE email=? AND password=?";
    $params = [$email, $password];
    $stmt = executeQuery($conn, $query, $params);
    if ($stmt) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}

function deleteUser($conn, $id)
{
    $query = "DELETE FROM users WHERE id=?";
    $params = [$id];
    return executeQuery($conn, $query, $params);
}

function getUserRole($conn, $email)
{
    $query = "SELECT role FROM users WHERE email=?";
    $params = [$email];
    $stmt = executeQuery($conn, $query, $params);
    if ($stmt) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return $result['role'];
        }
    }
    return null;
}

?>