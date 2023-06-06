<?php
include "../connect/connect.php";
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
    include ("../template/header.php");
    ?>
    
    <main class="AuthRegForm">
        <div class="container">
            <form class="needs-validation" novalidate method="POST" action="../connect/connectReg.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Имя</label>
                    <input type="text" class="form-control" name="Name" pattern="[А-Яа-яЁё]+" required id="" aria-describedby="">
                    <div class="invalid-feedback">
                        Введите Имя.
                    </div>
                    <div id="" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Фамилия</label>
                    <input type="text" class="form-control" name="Lastname" pattern="[А-Яа-яЁё]+" required id="" aria-describedby="">
                    <div class="invalid-feedback">
                        Введите Фамилию.
                    </div>
                    <div id="" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Отчество</label>
                    <input type="text" class="form-control" name= "Patronymic" pattern="[А-Яа-яЁё]+"  id="" aria-describedby="">
                    <div class="invalid-feedback">
                        Введите Отчество.
                    </div>
                    <div id="" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" class="form-control" name="Login" required id=""   pattern="[\x1F-\xBF]*" aria-describedby="">
                    <div class="invalid-feedback">
                        В логине должны присутсвовать латинские буквы.
                    </div>
                    <div id="" class="form-text"></div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
                    <input type="email" class="form-control" name="Email"  required id="exampleInputEmail1" aria-describedby="">
                    <div class="invalid-feedback">
                        Неверный адрес почты.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="Password" pattern="[A-Za-Z].{.8,}" name="Password" required>
                    <div class="invalid-feedback">
                        Введите пароль.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Подтвердите пароль</label>
                    <input type="password" class="form-control" name="ReapeatPass" id="confirm_password" name="confirm_password" required>
                    <div class="invalid-feedback">
                        Пароли не совпадают.
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" required id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1" >Согласен с правилами регистрации</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            </form>
        </div>
    </main>

    <?php
    include ("../template/footer.php");
    ?>
    
     <script>
        // Проверка данных на соотвествие условиям заполнения формы
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    var password = document.getElementById("Password");
                    var confirm_password = document.getElementById("confirm_password");

                    if (password.value !== confirm_password.value) {
                        confirm_password.setCustomValidity("Пароли не совпадают");
                    } else {
                        confirm_password.setCustomValidity("");
                    }
                    
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    
</body>
</html>