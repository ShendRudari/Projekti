<?php
session_start();

require_once 'Database.php';
require_once 'User.php';



$database = new Database("localhost", "root", "", "projektii");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    if (empty($name) || empty($email) || empty($password)) {
        
        echo "<div class='text-red-500'>All fields are required.</div>";
    } else {
        
        $user = new User($database);
        $registrationResult = $user->register($name, $email, $password);

        if ($registrationResult) {
           
            $loginResult = $user->login($email, $password);

            while ($loginResult == true) {
           
                header("Location: index.php");
                exit();
            } 
        } else {
            echo "<div class='text-red-500'>Registration failed. Please try again.</div>";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>


   <div class="signup">
        <h2>Sign Up</h2>
    

        <form onsubmit="return validationForm()">
            <div class="user name">
                <input id="name" type="text" name="name" placeholder="Your Name">
            </div>

            <div class="user email">
                <input id="email" type="email" name="email" placeholder="example@gmail.com">
            </div>

            <div class="user password">
                <input id="password" type="password" name="password" placeholder="Password">
            </div>

            <div class="user confirm-password">
                <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Confirm Password">
            </div>

            

 <script> 
public function insertoDhenat(){
$sql="INSERT INTO Studenti (emri,mbiemri,departamenti,adresa) VALUES (?,?,?,?)";
$stm=$this->dbconn->prepare($sql);
$stm->execute([$this->emri,$this->mbiemri,$this->departamenti,$this->adresa]);
echo "<script>
alert('dhenat jane ruajtur me sukses');
document.location='displayDhenat.php';
</script>
}

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        function validationForm() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            var nameRegex = /^[a-zA-Z\s]+$/;
            if (!nameRegex.test(name)) {
                alert('Please enter a valid name!');
                return false;
            }

            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address!');
                return false;
            }

            if (password.length < 6) {
                alert('Password must be at least 6 characters!');
                return false;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }

            return true;
        }
    </script>
    <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Kërko përdoruesin në bazë të emrit të përdoruesit
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

   
    if ($user && password_verify($password, $user["password"])) {
        
        $role = $user["role"];
      
    } else {
        
    }
}
?>

 


</body>
</html>