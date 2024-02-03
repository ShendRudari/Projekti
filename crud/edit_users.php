<?php

require '../config/Databasee.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$sql = 'SELECT * FROM users WHERE id = :id';
$query = $conn->prepare($sql);
$query->execute(['id' => $id]);

$user = $query->fetch();

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql_update = 'UPDATE users SET name = :name, email = :email WHERE id = :id';
    $query_update = $conn->prepare($sql_update);

    $query_update->bindParam(':name', $name);
    $query_update->bindParam(':email', $email);
    $query_update->bindParam(':id', $id);

    $query_update->execute();

    header("Location: users.php");
}
?>

<div class="container">
    <form method="post">
        <fieldset>
            <legend>Ndrysho te dhenat e perdoruesit</legend>
            <input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Shenoni emrin tuaj"><br>
            <input type="text" name="email" value="<?php echo $user['email']; ?>" placeholder="Shenoni email tuaj"><br>
            <br>
            <input type="submit" name="submit" value="Ruaj shenimet">
        </fieldset>
    </form>
</div>






