<?php

//Drin Citaku   Gr: G3A  id:222364985  
//Shend Rudari  Gr: G3B  id:222364786
session_start();

require_once 'crud/functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $conn = connectDatabase();
    if (!$conn) {
        echo "Connection failed!";
        exit();
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    try {

        $sql = "INSERT INTO kontakti (emri, email, message) VALUES (:emri, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':emri', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();


        echo "Succsess!";
    } catch (PDOException $e) {

        echo "Error sending the message!";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $conn = connectDatabase();

    if (!$conn) {
        echo "Error";
        exit();
    }



    if ($user) {
        if (password_verify($password, $user['password'])) {

            $_SESSION['email'] = $email;
            if ($user['role'] == 'admin') {
                header("Location: AdminDashboard.php");
            } else {
                header("Location: news.php");
            }
            exit();
        } else {

            $error = "Invalid email or password";
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
    <title>Gym</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <header class="header">
        <a href="#" class="logo">
            <i class="fas fa-dumbbell"></i>Gym
        </a>
        <nav class="navbar">
            <a href="#">Home</a>
            <a href="about.php">About Us</a>
            <a href="#contact">Contact us</a>
            <a href="#">|</a>
            <?php if (isset($_SESSION['email'])): ?>
                <?php if (isset($user) && $user['role'] == 'admin'): ?>
                    <a href="AdminDashboard.php" class="adminLink">Admin</a>
                <?php else: ?>
                    <a href="news.php">News</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="btnLogin">Login</a>
                <a href="Signup.php" class="SignUp">Sign Up</a>
            <?php endif; ?>
        </nav>
    </header>

    <section class="home">
        <div class="max-width">
            <div class="home-content">
                <h3>Help for ideal <br> body fitness</h3>
                <p></p>
                <a href="#GetStarted" id="btn">Get started</a>
            </div>
            <div class="home-image">

            </div>
        </div>
    </section>
    <section id="content">
        <div class="divi">
            <h1 class="h1 ">Our Journey</h1>
            <p><strong>Our journey is to help you get in the best shape possible. If you want more information
                    about the website please read the instruction carefully.</strong></p>
        </div>
    </section>
    <section id="GetStarted">

        <div class="weight-loss">
            <div class="image-container">
                <img src="mrbeast-weight-loss-transformation-070523-ea93dcf01569496da6a57182ee9ae9f9.JPG"
                    alt="Weight Loss Image">
                <h2><strong>Weight Loss</strong></h2>
                <p>Weight loss is a transformative journey that involves adopting healthier lifestyle habits to achieve
                    a more balanced and sustainable body mass. It goes beyond mere aesthetics, encompassing the pursuit
                    of improved overall well-being.</p>
            </div>
        </div>

        <div class="weight-gain">
            <div class="image-container">
                <img src="BMI_scale-v1.png" alt="Weight gain Image">

                <h2><strong>Weight Gain</strong></h2>
                <p>For individuals with a naturally lean or slender physique, embarking on a weight gain journey
                    involves a purposeful effort to build muscle mass and achieve a healthier and more robust body. The
                    key lies in a well-balanced approach that combines a calorie surplus, strength training, and
                    nutrient-dense foods.</p>
            </div>
        </div>

        <div class="muscle-building">
            <div class="image-container">
                <img src="0acb72ad591dcba309745e5b758bc6c7.jpg" alt="Muscle Building Image">
                <h2><strong>Building Muscle</strong></h2>
                <p>Building muscle is a dynamic process that involves targeted resistance training, proper nutrition,
                    and strategic recovery. Through consistent and challenging workouts, individuals stimulate their
                    muscles, prompting them to adapt and grow stronger.</p>
            </div>
        </div>
    </section>
    <section id="contact">

        <div class="contact-container">
            <h2>Contact Us</h2>
            <p> <em> If you have any questions or inquiries, feel free to reach out to us. We are here to assist you on
                    your
                    fitness journey. </em></p>
            <form action="#" method="post">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>

                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

    </section>
    <script>
        const nameInput = document.querySelector("#name");
        const email = document.querySelector("#email");
        const message = document.querySelector("#message");
        const success = document.querySelector("#success");
        const errorNodes = document.querySelectorAll(".error");

        function validateForm() {
            clearMessages();
            let errorFlag = false;

            if (nameInput.value.length < 1) {
                errorNodes[0].innerText = "Please fill out this field";
                nameInput.classList.add("error-border");
                errorFlag = true;
            }
            if (!emailIsValid(email.value)) {
                errorNodes[1].innerText = "Please fill out this field";
                email.classList.add("error-border");
                errorFlag = true;
            }
            if (message.value.length < 1) {
                errorNodes[2].innerText = "Please fill out this field";
                message.classList.add("error-border");
                errorFlag = true;
            }
            if (!errorFlag) {
                success.innerText = "Message is send successfuly!";
            }
        }

        function clearMessages() {
            for (let i = 0; i < errorNodes.length; i++) {
                errorNodes[i].innerText = "";
            }
            success.innerText = "";
            nameInput.classList.remove("error-border");
            email.classList.remove("error-border");
            message.classList.remove("error-border");
        }

        function emailIsValid(email) {
            let pattern = /\S+@\S+.\S+/;
            return pattern.test(email);
        }
    </script>
</body>

</html>