<?php
include_once '../../envi/database.php';

$message = null;

//Select cataegoris
$selectCategories = "SELECT * FROM categories ";
$allCategories = mysqli_query($conn, $selectCategories);

if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $price = $_POST['price'];
  $category = $_POST['category'];

  $insert = "INSERT INTO products VALUES(null,'$name','$price','$category')";
  $isDone = mysqli_query($conn, $insert);
  header("location: /INSTANT/TASK_2/data/products/list.php");
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
    header("location: /INSTANT/TASK_2/data/products/list.php");
  }
}
?>

<?php include_once '../../shared/head.php' ?>


<?php include_once '../../shared/navbar.php'; ?>



<h2 class="text-center text-light my-5">CRUD OPERATION USING PHP</h2>


<div class="container col-mid-6">
  <div class="card">
    <?php if ($message != null): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $message ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    <div class="card-body">
      <form method="post">
        <div class="form-group mb-3  text-center">
          <input value="<?= $name ?>" type="text" class="form-control" placeholder="Product name" name="name">
        </div>
        <div class="form-group mb-3">
          <input value="<?= $price ?>" type="number" class="form-control" placeholder="Price name" name="price">
        </div>
        <div class="form-group mb-3">
          <select name="category" id="" class="form-select">
            <option disabled selected>Select Category</option>
            <?php foreach ($allCategories as $item): ?>
            <?php if ($item['id'] == $categoryId): ?>
            <option value="<?= $item['id'] ?>">
              <?= $item['name'] ?>
            </option>
            <?php endif; ?>
            <?php endforeach; ?>

          </select>
          <div class="d-grid mt-3">
            <?php if ($update): ?>
            <button name="update" class="btn btn-warning w-50 mx-auto">Update</button>
            <?php else: ?>

            <button name="send" class="mx-auto w-50 btn btn-info">Add product</button>
            <?php endif; ?>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<?php include_once '../../shared/script.php'; ?>