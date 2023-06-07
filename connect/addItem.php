<?php
    include ("./connect.php");    
//Добавляет товар в бд
$query = "SELECT * FROM Category";
$result = mysqli_query($connect, $query);
if (!$result) {
    die("Ошибка при выполнении запроса: " . mysqli_error($connect));
}
    $sql_req = sprintf("INSERT INTO `Product` VALUES (NULL, '%s', '%s','%s','%s','%s','%s','%s','%s','%s');",
      $_POST["Image"],$_POST["Name"],$_POST["Price"], $_POST["Description"],$_POST["Country"],$_POST["Model"],$_POST["Year"],$_POST["Count"], $_POST["IDCategory"]);
      
    if (!$connect->query($sql_req)){
      return die("Ошибка". $connect->error);}

  return header ("Location:../Pages/admin.php?message=Товар был добавлен");

?>