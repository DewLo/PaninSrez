<?php
session_start();
include "../connect/connect.php";

// Получение данных о товаре из запроса
$product_id = $_GET['IDProduct'];

// Получение идентификатора пользователя из сессии
$user_id = $_SESSION['IDUser'];

// Проверка, существует ли уже запись в корзине для данного пользователя и товара
$sql = sprintf("SELECT * FROM `Cart` WHERE `IDUser` = %d AND `IDProduct` = %d", $user_id, $product_id);
$result = $connect->query($sql);

    if ($result && $result->num_rows > 0) {
        // Если запись уже существует, обновляем количество товара
        $row = $result->fetch_assoc();
        $quantity = $row['Quantity'] + 1;

        $update_sql = sprintf("UPDATE `Cart` SET `Quantity` = %d WHERE `ID` = %d", $quantity, $row['ID']);
        $update_result = $connect->query($update_sql);

            if (!$update_result) {
                die("Ошибка  записи в корзину: " . $connect->error);
            }
                } else {
                    // Если запись не существует, создаем новую запись в корзине
                    $insert_sql = sprintf("INSERT INTO `Cart` (`IDUser`, `IDProduct`, `Quantity`) VALUES (%d, %d, 1)", $user_id, $product_id);
                    $insert_result = $connect->query($insert_sql);

                        if (!$insert_result) {
                            die("Ошибка добавления в корзину: " . $connect->error);
                        }
                }

        // Перенаправление на страницу с корзиной или другую страницу
        header("Location: ../Pages/cart.php");
    exit();
?>