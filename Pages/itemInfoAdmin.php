<?php
include "../connect/connect.php";
include "../template/headerAdmin.php";


if(isset($_GET['ID'])){
    $itemID = $_GET['ID'];

    // Получить информацию о товаре из базы данных
    $query = "SELECT * FROM Product WHERE ID = $itemID";
    $result = $connect->query($query);
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Отображение формы редактирования товара
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Редактировать товар</title>
            </head>
            <body>
                <h1>Редактировать товар</h1>
                <form class="formPositionItem" action="../connect/updateItemInfo.php" method="POST">
                    <input class="form-control" type="hidden" name="IDItem" value="'.$row['ID'].'">
                    <label for="name">Наименование:</label>
                    <input class="form-control" type="text" name="Name" value="'.$row['Name'].'"><br>
                    <label for="price">Цена:</label>
                    <input class="form-control" type="text" name="Price" value="'.$row['Price'].'"><br>
                    <label for="description">Описание:</label>
                    <input class="form-control" name="Description" value="'.$row['Description'].'"></input><br>
                    <label for="count">Количество:</label>
                    <input class="form-control" type="text" name="Count" value="'.$row['Count'].'"><br>
                    <input type="submit" value="Сохранить">
                </form>
            </body>
            </html>
            ';
            } else {
                echo "Товар не был найден.";
            }
        } else {
            echo "Некорректный идентификатор товара.";
        }
        include "../template/footer.php"
        ?>
