<?php
include ("../connect/connect.php");
?>

<?php
session_start();

// Проверка роли пользователя
    if ($_SESSION['User_Role'] !== 'Admin') {
        //Если роль не соотвествует нужной, то происходит перенаправление на страницу авторизации
        header('Location: ../Pages/auth.php?message=У вас нет прав доступа');
        exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include ("../template/headerAdmin.php");
    ?>
   
    <main>
    <div>
            <h1>Заказы</h1>
            <div class="row">
              <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Заказ №3</h5>                        
                            <p>Статус заказа: На рассмотрении</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 13000 рублей</li>
                            <p class="card-text">Количество товаров: 3</p>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">Одобрить заказ</a>
                            <a class="card-link">Отклонить заказ</a>
                          </div>
              </div>

              <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <h5 class="card-title">Заказ №4</h5>
                            <p>Статус заказа: Отменен</p>
                          </div>
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">Цена: 24000 рублей</li>
                            <p class="card-text">Количество: 7</p>
                          </ul>
                          <div class="card-body">
                            <a class="card-link">Удалить заказ</a>
                          </div>
              </div>
            </div>
          </div>
          <hr>

          <h1>Добавить товар</h1>
          <?php
                $result = $connect->query("SELECT `ID`, `NameCategory` FROM `Category`");
                // Проверка, есть ли категории в базе данных
                if ($result !== false && $connect->affected_rows > 0) {
                    // Формирование выпадающего списка
                    echo '<form style="width: 900px; margin-left:25%;" action="../connect/addItem.php" method="POST">';
                    echo 'Выберите категорию: ';
                    echo '<select style="width: 200px;" name="IDCategory">';
                    
                    while ($row = $result->fetch_assoc()) {
                        $IDCategory = $row['ID'];
                        $categoryName = $row['NameCategory'];
                        echo "<option value='$IDCategory'>$categoryName</option>";
                    }
                    
                    echo '</select>';
                    
                    // Другие поля для ввода информации о товаре
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Введите путь изображения</label>';
                    echo '<input type="text" class="form-control" id="" name="Image">';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Название товара</label>';
                    echo '<input type="text" class="form-control" id="" name="Name">';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Цена товара</label>';
                    echo '<input type="text" class="form-control" id="" name="Price"  >';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Описание товара</label>';
                    echo '<input type="text" class="form-control" id="" name="Description"  >';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Страна производитель</label>';
                    echo '<input type="text" class="form-control" id="" name="Country"  >';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Название модели</label>';
                    echo '<input type="text" class="form-control" id="" name="Model"  >';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Введите год</label>';
                    echo '<input type="text" class="form-control" id="" name="Year"  >';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="exampleInputEmail1" class="form-label">Введите количество</label>';
                    echo '<input type="text" class="form-control" id="" name="Count"  >';
                    echo '</div>';
                    echo '<button type="submit" class="btn btn-primary">Добавить</button>';
                    echo '</form>';
                } else {
                    echo "Нет доступных категорий.";
                }
          
          ?>
          <hr>
          <div class="container">
            
            <h1>Удалить товар</h1>
                <?php
                    if (isset($_POST['delete_product'])) {
                        $ID = $_POST['delete_product'];
                        $query = "DELETE FROM Product WHERE ID = $ID";
                        $result = $connect->query($query);
                            if ($result) {
                                echo "Товар удален.";
                            } else {
                                echo "Ошибка при удалении товара: " . $connect->error;
                            }
                    }

                    $query = "SELECT * FROM Product";
                    $result = $connect->query($query);

                    echo '<div class="container">';
                    echo '<div class="row">';
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-md-4">';
                            echo '<div class="card">';
                            echo '<img src="' . $row['Image'] . '" alt="Изображение товара">';
                            echo '<h3>' . $row['Name'] . '</h3>';
                            echo '<p>Цена: ' . $row['Price'] . '</p>';
                            echo '<p>Описание: ' . $row['Description'] . '</p>';
                            echo '<p>Количество: ' . $row['Count'] . '</p>';
                            echo '<form class="formPosition" method="POST">';
                            echo '<input type="hidden" name="delete_product" value="' . $row['ID'] . '">';
                            echo '<a class="btn btn-primary" href ="../Pages/ItemAdmin.php?Id= '.$row['Id'].'">Редактировать</a>';
                            echo '<button type="submit" class="btn btn-primary">Удалить</button>';
                            echo '</form>';
                            echo '</div>';
                            echo '</div>';
                            
                        }
                    }

                    echo '</div>';
                    echo '</div>';
                ?>
</div><hr>
            <h1>Добавить категорию</h1>
                <form action= "../connect/addCategory.php" method = "POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Введите название</label>
                    <input type="text" style="width:900px; margin-left: 27%;" class="form-control" id="" name="NameCategory">
                </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
                <hr>
            <h1>Удалить категорию</h1>
                <?php
                    if (isset($_POST['delete_category'])) {
                        $categoryID = $_POST['delete_category'];
                        
                        // Удаление товаров, связанных с категорией
                        $deleteProductsQuery = "DELETE FROM Product WHERE IDCategory = $categoryID";
                        $deleteProductsResult = $connect->query($deleteProductsQuery);
                        
                            if ($deleteProductsResult) {
                                // Удаление самой категории
                                $deleteCategoryQuery = "DELETE FROM Category WHERE ID = $categoryID";
                                $deleteCategoryResult = $connect->query($deleteCategoryQuery);
                                
                                if ($deleteCategoryResult) {
                                    echo "Категория удалена успешно.";
                                } else {
                                    echo "Ошибка при удалении категории: " . $connect->error;
                                }
                            } else {
                                echo "Ошибка при удалении товаров: " . $connect->error;
                            }
                    }

                $query = "SELECT * FROM Category";
                $result = $connect->query($query);

                echo '<div class="row">';
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="card">';
                        echo '<h3>' . $row['NameCategory'] . '</h3>';
                        echo '<form method="POST">';
                        echo '<input type="hidden" name="delete_category" value="' . $row['ID'] . '">';
                        echo '<button type="submit" class="btn btn-primary">Удалить</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
                echo '</div>';
                ?>
        
        
    </main>

    <?php
    include ("../template/footer.php");
    ?>

</body>
</html>