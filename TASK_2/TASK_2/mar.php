<?php
$count = 1;


$host = "localhost";
$user = "root";
$password = "";
$dbName = "shop";
try {
  $conn = mysqli_connect($host, $user, $password, $dbName);
} catch (Exception $e) {
  echo $e->getMessage();
}


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
//READ PRODUCTS
$selectProducts = "SELECT * FROM `product_with_category`  order BY id DESC";
$allProducts = mysqli_query($conn, $selectProducts);





if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneProduct = "SELECT * FROM `product_with_category` WHERE id = $id";
  $selectOneProductItem = mysqli_query($conn, $selectOneProduct);
  $oneProduct = mysqli_fetch_assoc($selectOneProductItem);
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







//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM products WHERE id = $id";
  mysqli_query($conn, $delete);
  $allProducts = mysqli_query($conn, $selectProducts);
}


?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/INSTANT/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
  <?php include_once './shared/navbar.php'; ?>
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



  <h2 class="text-center text-light my-5">List All Products</h2>

  <div class="container col-md-6">
    <div class="card">
      <div class="card-body">
        <table class="table table-dark">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th colspan="3">Action</th>
          </tr>
          <?php foreach ($allProducts as $item): ?>
          <tr>
            <th><?= $count++ ?></th>
            <th><?= $item['prodName'] ?></th>

            <th><a href="/INSTANT/TASK_2/mar.php?view=<?= $item['id'] ?>">
                <i class="bi bi-eye text-info"></i>
              </a></th>


            <th><a href="/INSTANT/TASK_2/mar.php?edit=<?= $item['id'] ?>">
                <i class="bi bi-pencil-square text-warning"></i>
              </a></th>


            <th><a href="/INSTANT/TASK_2/mar.php?delete=<?= $item['id'] ?>">
                <i class="bi bi-trash text-danger"></i>
              </a></th>


          </tr>
          <?php endforeach; ?>
        </table>
      </div>

    </div>
  </div>

  <?php if (isset($_GET['view'])): ?>
  <div class="mymodel">
    <div class="myContent">
      <div class="card p-4">
        <h6>
          List view product
          <!-- C:\xampp\htdocs\INSTANT\TASK_2\mar.php -->
          <a class="float-end" href="http://localhost/INSTANT/TASK_2/mar.php"><i
              class="fa-solid fa-square-xmark"></i></a>
        </h6>


        <div class="card-body p-3">
          <h6>Name : <?= $oneProduct['prodName'] ?></h6>
          <br>
          <hr>
          <h6>price : <?= $oneProduct['price'] ?></h6>
          <br>
          <hr>
          <h6>categoryName : <?= $oneProduct['categoryName'] ?></h6>
          <br>
          <hr>
          <h6>description : <?= $oneProduct['description'] ?></h6>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
  <script src="/INSTANT/js/main.js"></script>
</body>

</html>