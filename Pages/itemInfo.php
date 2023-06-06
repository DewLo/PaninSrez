<?php
include "../connect/connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include ("../template/header.php");
    ?>
    
    <main>
        <div class = "container">
            <?php
            // Подключение к базе данных и другие необходимые настройки
                if (isset($_GET['ID'])) {
                    $ID = $_GET['ID'];
            
                    // Здесь вы можете выполнить запрос к базе данных, чтобы получить данные о товаре по его id
                    $query = "SELECT * FROM Product WHERE ID = $ID";
                    $result = mysqli_query($connect, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        
                        // Отображение информации о товаре
                        echo '<div class = "brImage">';
                        echo '<h1>' . $row['Name'] . '</h1>';
                        echo '<img src="' . $row['Image'] . '" alt="Представление товара">';
                        echo '<p>Цена: ' . $row['Price'] . ' рублей</p>';
                        echo '<p>Описание: ' . $row['Description'] . '</p>';
                        echo '<p>Страна: '.$row['Country'].'</p>';
                        echo '<p>Модель: '.$row['Model'].'</p>';
                        echo '<p>Год: '.$row['Year'].'</p>';
                    }
                }
            ?>
        </div>  
</main>

    <?php
    include ("../template/footer.php");
    ?>

</body>
</html>