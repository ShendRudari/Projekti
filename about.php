<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  
    <style>
        body {
            margin: 0; 
            font-family: 'Arial', sans-serif;
            background-color: #fff; 
        }

        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('your-background-image.jpg'); 
            background-size: cover;
            background-position: center;
        }

        .outer-container {
            padding: 20px;
            position: relative; 
            z-index: 1;          
            max-width: 800px; 
            margin: 0 auto; 
            border: 1px solid #ddd; 
            border-radius: 10px; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8); 
        }

        .about-us {
            text-align: center;
            color: #333;
        }

        .about-us h2 {
            font-size: 3em;
            color: green;
            margin-bottom: 20px;
            position: relative;
            display: inline-block;
        }

        .about-us h2 span {
            display: block;
            font-size: 0.7em;
            color: #555;
            margin-top: 5px;
        }

        .about-us h2::before {
            content: "";
            position: absolute;
            width: 30px;
            height: 3px;
            background-color: green;
            /* Reddish color */
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .about-us p {
            font-size: 1.3em;
            line-height: 1.6;
            margin-bottom: 20px;
           
        }

        .about-us img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            margin-top: 20px;
        }

        .community,
        .contact-info {
            margin-top: 30px;
            font-size: 1.3em;
            color: #777;
        }

        .community p,
        .contact-info p {
            margin-bottom: 20px;
        }

        .contact-info a {
            color: green;
            /* Reddish color */
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body> 
     
    <div class="background-container"></div>
    <div class="outer-container">
        <div class="about-us">
            <h2>Elevate Your Fitness Passion <span>with PowerFit Seduction</span></h2>

            <p>Indulge in the intoxicating allure of PowerFit Seduction, where we're not just a gym; we're a tantalizing
                community driven by the pursuit of your most captivating and empowered self. Our mission is to ignite
                desire, motivate your soul, and transform lives through the seduction of fitness.</p>

            <img src="FotoBg.jpg" alt="Gym Interior">

            <p>Our seductive, state-of-the-art facilities provide the perfect ambiance for you to break a sweat, push
                your limits, and achieve the fitness allure you desire. Whether you're an enchanting fitness enthusiast
                or just stepping into the world of seductive wellness, PowerFit Seduction is your irresistible second
                home.</p>
                    <img src ="woman.jpg"alt ="gym" >
            <div class="community">
                <p>Embrace the seduction of community. Together, we celebrate victories, overcome alluring challenges,
                    and forge lasting connections. Our certified trainers are here to guide you through a journey where
                    you're not just a member but a cherished part of the PowerFit Seduction family.</p>
            </div>

           
         <div class="creative-section">
            <h3>Unleash Your Potential</h3>
            <p>Discover the power within you and elevate your fitness experience. Our seductive atmosphere is designed to inspire and transform.</p>
            <button onclick="revealSecret()">Reveal a Fitness Secret</button>
            <p id="secretText" style="display: none; color: green; font-weight: bold;">Secret: Consistency is the key to unlocking your true fitness potential!</p>
        </div>
    
        <script>
            function revealSecret() {
                var secretText = document.getElementById('secretText');
                secretText.style.display = 'block';
            }
        </script>
    
    </div>
    </body>
    </html>