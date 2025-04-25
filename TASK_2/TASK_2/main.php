<?php

include_once './envi/database.php';

$message = null;
$selectCategories = "SELECT * FROM categories ";
$allCategories = mysqli_query($conn, $selectCategories);

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];

  $insert = "INSERT INTO products VALUES(null,'$name','$price','$category')";
  $isDone = mysqli_query($conn, $insert);
  if ($isDone) {
    $message = "Insert Prduct Successfully";
  } else {
    $message = NUll;
  }
}







//edit 

$name = null;
$price = null;
$categoryId = null;
$update = false;
if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $selectOneProduct = "SELECT * FROM `products` WHERE id = $id";
  $selectOneProductItem = mysqli_query($conn, $selectOneProduct);
  $oneProduct = mysqli_fetch_assoc($selectOneProductItem);
  $name = $oneProduct['name'];
  $price = $oneProduct['price'];
  $categoryId = $oneProduct['categoryID'];
  if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $update = "UPDATE products SET name = '$name' , price = '$price', categoryId = $categoryId where id = $id";
    mysqli_query($conn, $update);
    header("location: /INSTANT/TASK_2/mar.php");
  }
}









?>



<?php include_once './shared/head.php' ?>


<?php include_once './shared/navbar.php'; ?>


<div class="container">
  <div class="card">
    <div class="card-body">
      <h1 class="display-1 text-center mt-5 pt-1">Welcome At Home Page</h1>
    </div>
  </div>
</div>

<?php include_once '.././TASK_2/shared/script.php'; ?>