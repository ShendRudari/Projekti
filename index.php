<?

session_start();

require_once 'Database.php';
require_once 'User.php';

$database = new Database("localhost", "root", "", "projektii");
$user = new \Crud\User($database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if ($user->login($email, $password)) {
            $userData = $user->getUserByEmail($email);

            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['user_name'] = $userData['name'];
            $_SESSION['user_role'] = $userData['role'];

            header("Location: index.php");
            exit();
        } else {
            echo "Invalid login credentials. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gym</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
<header class="header">
    <a href="#" class="logo">
        <i class="fas fa-dumbbell"></i>Gym
    </a>
    <nav class="navbar">
        <a href="#">Home</a>
        <a href="news.php">New</a>
        <a href="about.php">About Us</a>
        <a href="#contact">Contact us</a>
        <a href="#">|</a>
        <a href="login.php" class="btnLogin">Login</a>
        <a href="Signup.php" class="SignUp">Sign Up</a>
        <a href="admin.php" class="adminLink">Admin</a>
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
        <p><strong>Our journey is to help you get in the best shape possible. If  you want more information
                about the website please  read the instruction carefully.</strong></p>
    </div>
</section>
<section id="GetStarted">

    <div class="weight-loss">
        <div class="image-container">
            <img src="mrbeast-weight-loss-transformation-070523-ea93dcf01569496da6a57182ee9ae9f9.JPG" alt="Weight Loss Image">
            <h2><strong>Weight Loss</strong></h2>
            <p>Weight loss is a transformative journey that involves adopting healthier lifestyle habits to achieve a more balanced and sustainable body mass. It goes beyond mere aesthetics, encompassing the pursuit of improved overall well-being.</p>
        </div>
    </div>

    <div class="weight-gain">
        <div class="image-container">
        <img src="BMI_scale-v1.png" alt="Weight gain Image">

            <h2><strong>Weight Gain</strong></h2>
            <p>For individuals with a naturally lean or slender physique, embarking on a weight gain journey involves a purposeful effort to build muscle mass and achieve a healthier and more robust body. The key lies in a well-balanced approach that combines a calorie surplus, strength training, and nutrient-dense foods.</p>
        </div>
    </div>

    <div class="muscle-building">
        <div class="image-container">
            <img src="0acb72ad591dcba309745e5b758bc6c7.jpg" alt="Muscle Building Image">
            <h2><strong>Building Muscle</strong></h2>
            <p>Building muscle is a dynamic process that involves targeted resistance training, proper nutrition, and strategic recovery. Through consistent and challenging workouts, individuals stimulate their muscles, prompting them to adapt and grow stronger.</p>
        </div>
    </div>
</section>
<section id="contact">

    <div class="contact-container">
        <h2>Contact Us</h2>
        <p>If you have any questions or inquiries, feel free to reach out to us. We are here to assist you on your fitness journey.</p>
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
</body>
</html>