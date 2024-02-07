<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
        }

        .exercise {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .exercise:hover {
            transform: translateY(-5px);
        }

        .exercise img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .exercise-content {
            padding: 20px;
        }

        .exercise h2 {
            color: #333;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .exercise p {
            color: #666;
            font-size: 1rem;
            line-height: 1.5;
        }


        .back-button {
            margin-top: 20px;
            text-align: center;
        }

        .back-button a {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <header>
        <h1>Workout Page</h1>
    </header>

    <div class="container">
        <div class="exercise" onclick="window.location.href='https://www.google.com'">
            <img src="./img/Barbell-Bench-Press.gif" alt="Bench Press">
            <div class="exercise-content">
                <h2>Bench Press</h2>
                <p>The bench press is one of the most fundamental and iconic exercises in the realm of strength training
                    and bodybuilding. It is a compound movement that primarily targets the muscles of the chest,
                    shoulders, and triceps, making it an integral part of any upper body workout routine.
                    When performing the bench press, the individual lies flat on a bench with their back firmly pressed
                    against it, feet planted firmly on the ground, and grips the barbell with both hands at a slightly
                    wider than shoulder-width distance.</p>
            </div>
        </div>

        <div class="exercise" onclick="window.location.href='https://www.google.com'">
            <img src="./img/high-bar-squat-form.gif" alt="Squat">
            <div class="exercise-content">
                <h2>Squat</h2>
                <p>The squat is a compound movement that targets the quadriceps, hamstrings, glutes, and lower back.
                    The squat is a foundational compound exercise renowned for its ability to sculpt powerful lower
                    bodies while simultaneously engaging various muscle groups throughout the body.
                    As one of the "big three" powerlifting exercises alongside the bench press and deadlift, squats are
                    essential for building overall strength, muscle mass, and functional movement patterns.</p>
            </div>
        </div>

        <div class="exercise" onclick="window.location.href='https://www.google.com'">
            <img src="./img/Deadlift.webp" alt="Deadlift">
            <div class="exercise-content">
                <h2>Deadlift</h2>
                <p>The deadlift stands as a fundamental compound exercise that holds a revered status in strength
                    training and functional fitness regimens alike.
                    Its simplicity belies its effectiveness, as it engages multiple muscle groups simultaneously, making
                    it a staple in strength and muscle-building programs.
                    In essence, the deadlift involves lifting a loaded barbell from the ground to a standing position
                    while maintaining a neutral spine and braced core.
                    This movement primarily targets the posterior chain, including the lower back, glutes, hamstrings,
                    and traps, while also engaging the core, forearms, and grip strength.
                    Beyond its muscle-building benefits, the deadlift fosters improved posture, spinal integrity, and
                    overall strength that translates into everyday activities and athletic performance.</p>
            </div>
        </div>

        <div class="back-button">
            <a href="news.php">Back to News</a>
        </div>
    </div>


    <footer style="text-align: center; background-color: #333; color: #fff; padding: 1em 0;">
        <p>&copy; 2024 Workout Page. All rights reserved.</p>
    </footer>

</body>

</html>