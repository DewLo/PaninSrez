<?php
include "../connect/connect.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Дом музыки</title>
        <link href="../css/style.css" rel="stylesheet">
    </head>
    <body>
        
        <?php
        include ("../template/headerUser.php")
        ?>

        
        <main>
          <div>
            <h1>Ваши заказы</h1>
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
                            <a class="card-link">Удалить заказ</a>
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
                            <a class="card-text">Заказ отменен</a>
                          </div>
              </div>
            </div>
          </div>
        </main>
        <?php
        include("../template/footer.php")
        ?>

</html>