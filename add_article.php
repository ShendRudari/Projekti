<?php
require 'config/Databasee.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>



<div class="container main-content">
    <?php
    
    $sql = "SELECT * FROM articles";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
     
            echo '<div class="article">';
            echo '<img src="' . $row["image"] . '" alt="Fitness Article Image">';
            echo '<h2>' . $row["title"] . '</h2>';
            echo '<p>Author: ' . $row["author"] . ' | Published on: ' . $row["date"] . '</p>';
            echo '<p>' . $row["content"] . '</p>';
            echo '<div class="read-more">';
            echo '<p>' . $row["additional_content"] . '</p>';
            echo '</div>';
            echo '<a href="#" onclick="toggleReadMore(this)">Read more</a>';
            echo '</div>';
        }
    } else {
        echo "Nuk ka artikuj.";
    }
    ?>
</div>



</body>
</html>
