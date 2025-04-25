<?php
$count = 1;

include_once '../../envi/database.php';


//READ PRODUCTS
$selectProducts = "SELECT * FROM `product_with_category`  order BY id DESC";
$allProducts = mysqli_query($conn, $selectProducts);









//Delete
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = "DELETE FROM products WHERE id = $id";
  mysqli_query($conn, $delete);
  $allProducts = mysqli_query($conn, $selectProducts);
}



if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneProduct = "SELECT * FROM `products` WHERE id = $id";
  $selectOneProductItem = mysqli_query($conn, $selectOneProduct);
  $oneProduct = mysqli_fetch_assoc($selectOneProductItem);
}

?>



<?php include_once '../../shared/head.php' ?>


<?php include_once '../../shared/navbar.php'; ?>




<?php if (isset($_GET['view'])): ?>
<div class="mymodel">
  <div class="myContent">
    <div class="card p-4">
      <h6>
        List view product
        <!-- C:\xampp\htdocs\INSTANT\TASK_2\mar.php -->
        <a class="float-end" href="/INSTANT/TASK_2/data/products/list.php"><i class="fa-solid fa-square-xmark"></i></a>
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

          <th><a href="/INSTANT/TASK_2/data/products/list.php?view=<?= $item['id'] ?>">
              <i class="bi bi-eye text-info"></i>
            </a></th>


          <th><a href="/INSTANT/TASK_2/data/products/add.php?edit=<?= $item['id'] ?>">
              <i class="bi bi-pencil-square text-warning"></i>
            </a></th>


          <th><a href="/INSTANT/TASK_2/data/products/list.php?delete=<?= $item['id'] ?>">
              <i class="bi bi-trash text-danger"></i>
            </a></th>


        </tr>
        <?php endforeach; ?>
      </table>
    </div>

  </div>
</div>


<?php include_once '../../shared/script.php'; ?>