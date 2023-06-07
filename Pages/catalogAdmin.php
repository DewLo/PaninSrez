<?
include ("../connect/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include ("../template/headerAdmin.php");
    ?>
    
    <main>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Отфильтровать по:
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="?Category=3">Струнные</a></li>
          <li><a class="dropdown-item" href="?Category=2">Клавишные</a></li>
          <li><a class="dropdown-item" href="?Category=1">Смычковые</a></li>
        </ul>
  </div>
<br>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Отсортировать по:
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="#">Цена</a></li>
          <li><a class="dropdown-item" href="#">Наименование: от А до Я</a></li>
          <li><a class="dropdown-item" href="#">Наименование: от Я до А</a></li>
          <li><a class="dropdown-item" href="#">Год производства</a></li>
        </ul>
      </div>


      <br>
    <?php
    if (isset($_GET['Category'])) {
      $categoryId = $_GET['Category'];
      
      // SQL-запрос с фильтрацией по выбранной категории
      $query = "SELECT * FROM Product WHERE IDCategory = $categoryId";
  } else {
      // Запрос без фильтрации, если категория не была выбрана
      $query = "SELECT * FROM Product";
  }
    $result= $connect->query($query);
    echo '<div class= "row">';
    if ($result){
        while($row= $result->fetch_assoc())
    {
      if ($row['Count'] >= 1) {
        echo '<div class = "col-md-4">';
        echo '<div class = "brImage">';
        echo '<div class = "card">';
        echo '<img style="imgCat" src="'.$row['Image'].'"alt="Изображение товара"';
        
        echo '<h3>'.$row['Name'].'</h3>';
        echo '<p>Цена:' .$row['Price'].' рублей </p>';
        echo '<p>Описание: '.$row['Description'].'</p>';
        
        echo '<p>Количество: '.$row['Count'].'</p>';
        echo '<a href ="../Pages/itemInfoAdmin.php?ID= '.$row['ID'].'">Подробнее</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
  }
    echo '</div>';
}
    ?>

    </main>

    <?php
    include ("../template/footer.php");
    ?>

    

</body>
</html>