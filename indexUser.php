<?
session_start();
include ("./connect/connect.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include ("./template/headerUser.php");
    ?>

    <h1 style="margin-left: 35%">Music House - музыка для души!</h1>

    <main>
    <div class= "container">
            <div class= "row">     
                <?php

                    $query = "SELECT * FROM Product ORDER BY ID DESC LIMIT 5";
                    $result = mysqli_query($connect, $query);

                    if ($result) {
                    echo '<div Id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">';
                        
                    echo '<div class="carousel-inner">';

                    $active = 'active';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="carousel-item ' . $active . '">';
                            echo '<img class="imgCar" src="' . $row['Image'] . '" alt="Изображение товара">';
                            echo '<h3 style="color: black;">' . $row['Name'] . '</h3>';
                            echo '<p style="color: black;">Описание: ' . $row['Description'] . '</p>';
                            
                            echo '<div class="carousel-caption d-none d-md-block">';
                        
                            echo '</div>';
                            echo '</div>';
                            $active = '';
                        }
                    echo '</div>';
                    echo '<a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" type="button" data-bs-slide="prev">';
                    echo '<span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: black;"></span>';
                    echo '<span class="visually-hidden">Prev</span>';
                    echo '</a>';
                    echo '<a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" type="button" data-bs-slide="next">';
                    echo '<span class="carousel-control-next-icon" aria-hidden="true" style="background-color: black;"></span>';
                    echo '<span class="visually-hidden">Next</span>';
                    echo '</a>';
                    echo '</div>';
                        
                    echo'</div>';
                    }
                ?>
            </div>
        </div>
    
    </main>
    

    <?php
    include ("./template/footer.php")
    ?>
</body>
</html>