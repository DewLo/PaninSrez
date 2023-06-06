<?php
    include ("/connect/connect.php");    

//Добавляет категорию в БД
    $sql_req = sprintf("INSERT INTO `Category` VALUES (NULL, '%s');",
      $_POST["Name"]);


    if (!$connect->query($sql_req)){
      return die("Ошибка". $connect->error);}

  return header ("Location:/admin.php?message=Категория была добавлена");

?>