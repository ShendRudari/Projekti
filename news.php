<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness News</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        nav {
            background-color: #444;
            color: #fff;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .main-content {
            padding: 20px;
        }

        .article {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .article img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .article h2 {
            color: #333;
        }

        .article p {
            color: #555;
        }

        .article .read-more {
            display: none;
        }

        .article.expanded .read-more {
            display: block;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }
    </style>
</head>
<body>

 
<div class="container main-content">
   
    <form action="add_article.php" method="post">
        <fieldset>
            <legend>Shto artikull të ri</legend>
            <label for="articleTitle">Titulli</label><br>
            <input type="text" name="articleTitle" placeholder="Shkruani titullin"><br>
            <label for="articleAuthor">Autori</label><br>
            <input type="text" name="articleAuthor" placeholder="Emri i autorit"><br>
            <label for="articleDate">Data</label><br>
            <input type="date" name="articleDate"><br>
            <label for="articleImage">Imazhi</label><br>
            <input type="text" name="articleImage" placeholder="URL i imazhit"><br>
            <label for="articleContent">Përmbajtja</label><br>
            <textarea name="articleContent" rows="4" placeholder="Shkruani përmbajtjen"></textarea><br>
            <br>
            <input type="submit" name="submit" value="Ruaj artikullin">
        </fieldset>
    </form>

    
    <div class="article">
        <img src="health-1.jpg" alt="Fitness Article Image">
        <h2>10 Tips for a Healthier Lifestyle</h2>
        <p>Author: John Doe | Published on: 2024-02-03</p>
        <p>Discover the top 10 tips for maintaining a healthy and active lifestyle...</p>
      
        <div class="read-more">
            <p>Living a healthy lifestyle involves making informed decisions about what you eat, how you exercise, and...</p>
            <p>Here are some additional tips to help you on your journey to a healthier lifestyle:</p>
            <ul>
                <li>Eat a balanced diet rich in fruits, vegetables, and whole grains.</li>
                <li>Stay hydrated by drinking plenty of water throughout the day.</li>
                <li>Get regular exercise, including both cardio and strength training.</li>
                <li>Get enough sleep to support overall well-being.</li>
            </ul>
        </div>
        <a href="#" onclick="toggleReadMore(this)">Read more</a>
    </div>


</div>

 
    <header>
        <h1>Fitness News</h1>
    </header>
    <nav>
        <ul>
            
            <li><a href="#">Workouts</a></li>
            <li><a href="#">Nutrition</a></li>
            <li><a href="#">Tips</a></li>
          
        </ul>
    </nav>
    <div class="container main-content">
        <div class="article">
            <img src="health-1.jpg" alt="Fitness Article Image">
            <h2>10 Tips for a Healthier Lifestyle</h2>
            <p>Discover the top 10 tips for maintaining a healthy and active lifestyle...</p>
            <div class="read-more">
                <p>Living a healthy lifestyle involves making informed decisions about what you eat, how you exercise, and...</p>
                <p>Here are some additional tips to help you on your journey to a healthier lifestyle:</p>
                <ul>
                    <li>Eat a balanced diet rich in fruits, vegetables, and whole grains.</li>
                    <li>Stay hydrated by drinking plenty of water throughout the day.</li>
                    <li>Get regular exercise, including both cardio and strength training.</li>
                    <li>Get enough sleep to support overall well-being.</li>
                </ul>
            </div>
            <a href="#" onclick="toggleReadMore(this)">Read more</a>
        </div>
        <div class="article">
            <img src="Exercise_Prescription_for_Life.png" alt="Fitness Article Image">
            <h2>Effective Cardio Workouts for Beginners</h2>
            <p>If you're new to fitness, here are some cardio workouts to get you started on your fitness journey...</p>
            <div class="read-more">
                <p>Cardiovascular exercise is essential for heart health and overall well-being. If you're a beginner, consider...</p>
                <p>Here are some effective cardio workouts for beginners:</p>
                <ul>
                    <li>Brisk walking: Start with a moderate pace and gradually increase speed.</li>
                    <li>Cycling: Whether outdoors or on a stationary bike, cycling is a great low-impact option.</li>
                    <li>Jogging in place: A simple yet effective way to get your heart rate up.</li>
                    <li>Dance workouts: Have fun while breaking a sweat with dance-based cardio exercises.</li>
                </ul>
            </div>
            <a href="#" onclick="toggleReadMore(this)">Read more</a>
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
</body>
</html>