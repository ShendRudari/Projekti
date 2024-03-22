<?php
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}


if (isset($_SESSION['logged_out']) && $_SESSION['logged_out'] === true) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="news.css">
</head>

<body>
    <header>
        <h1>Fitness News</h1>
    </header>
    <form method="get" action="logout.php">
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
    <nav>
        <ul>
            <li><a href="workout.php">Workouts</a></li>
            <li><a href="nutrition.php">Nutrition</a></li>

        </ul>
    </nav>
    <div class="container main-content">

        <div id="articleCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="article">
                        <img src="health-1.jpg" alt="Fitness Article Image">
                        <h2>10 Tips for a Healthier Lifestyle</h2>
                        <p>Discover the top 10 tips for maintaining a healthy and active lifestyle...</p>
                        <div class="read-more">
                            <p>Living a healthy lifestyle involves making informed decisions about what you eat, how you
                                exercise,
                                and...</p>
                            <p>Here are some additional tips to help you on your journey to a healthier lifestyle:</p>
                            <ul>
                                <li>Eat a balanced diet rich in fruits, vegetables, and whole grains.</li>
                                <li>Stay hydrated by drinking plenty of water throughout the day.</li>
                                <li>Get regular exercise, including both cardio and strength training.</li>
                                <li>Get enough sleep to support overall well-being.</li>
                            </ul>
                        </div>
                        <a href="#" onclick="toggleReadMore(this)" class="read-more-link">Read more</a>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="article">
                        <img src="Exercise_Prescription_for_Life.png" alt="Fitness Article Image">
                        <h2>Effective Cardio Workouts for Beginners</h2>
                        <p>If you're new to fitness, here are some cardio workouts to get you started on your fitness
                            journey...</p>
                        <div class="read-more">
                            <p>Cardiovascular exercise is essential for heart health and overall well-being. If you're a
                                beginner,
                                consider...</p>
                            <p>Here are some effective cardio workouts for beginners:</p>
                            <ul>
                                <li>Brisk walking: Start with a moderate pace and gradually increase speed.</li>
                                <li>Cycling: Whether outdoors or on a stationary bike, cycling is a great low-impact
                                    option.</li>
                                <li>Jogging in place: A simple yet effective way to get your heart rate up.</li>
                                <li>Dance workouts: Have fun while breaking a sweat with dance-based cardio exercises.
                                </li>
                            </ul>
                        </div>
                        <a href="#" onclick="toggleReadMore(this)" class="read-more-link">Read more</a>
                    </div>
                </div>
            </div>

            <a class="carousel-control-prev" href="#articleCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#articleCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Fitness News. All rights reserved.</p>
    </footer>

    <script>
        function toggleReadMore(link) {
            const article = link.parentElement;
            article.classList.toggle('expanded');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>