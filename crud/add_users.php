<?php

require '../config/Databasee.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
    $query = $conn->prepare($sql);

    $query -> bindParam(':name' ,$name);
    $query -> bindParam(':email' ,$email);
    $query -> bindParam(':password' ,$password);

    $query -> execute();

    header("Location: users.php ");
}
?>

<div class="container">
    <form action="add_users.php" method="post">

    <fieldset>
    <legend>Shto perdorues te ri</legend>
        <label for="fname">Emri</label><br>
        <input type="text" name="name" placeholder="Shenoni emrin tuaj"><br>
        <label for="femail">E-mail</label><br>
        <input type="text" name="email" placeholder="Shenoni email tuaj"><br>
        <label for="fpassword">password</label><br>
        <input type="password" name="password" placeholder="Shenoni password tuaj"><br>
        <br>
        <input type="submit" name="submit" value="Ruaj shenimet">
    </fieldset>
    </form>
</div>
