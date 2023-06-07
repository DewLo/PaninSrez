<?php
include "../connect/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemID = $_POST['IDItem'];
    $name = $_POST['Name'];
    $price = $_POST['Price'];
    $description = $_POST['Description'];
    $count = $_POST['Count'];

    // Обновление информации о товаре в базе данных
    $query = "UPDATE `Product` SET `Name`='$name',`Price`='$price',`Description`='$description',`Count`='$count' WHERE ID = '$itemID'";
    $result = $connect->query($query);

    if ($result) {
        header("Location:../Pages/admin.php");
    } else {
        echo "Ошибка при обновлении товара: " . $connect->error;
    }
} else {
    echo "Некорректный метод запроса.";
}
?>
