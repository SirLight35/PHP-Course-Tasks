<?php
$count = 1;
include_once '../../envi/database.php';

$selectNotOrderedProds = "SELECT * FROM `products_no_orders` ORDER BY id DESC";
$allNotOrderedProds = mysqli_query($conn, $selectNotOrderedProds);

if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneProduct = "SELECT * FROM `products_no_orders` WHERE id = $id";
  $selectOneProductItem = mysqli_query($conn, $selectOneProduct);
  $oneProduct = mysqli_fetch_assoc($selectOneProductItem);
}
?>

<!-- importing head -->
<?php include_once '../../shared/head.php' ?>

<!-- importing navbar -->
<?php include_once '../../shared/navbar.php'; ?>
<!-- products list -->




<?php if (isset($_GET['view'])): ?>
<div class="mymodel">
  <div class="myContent">
    <div class="card p-4">
      <h4>product details
        <a class="float-end" href="/INSTANT/TASK_2/data/products/noOrdered.php"><i
            class="fa-solid fa-square-xmark"></i></a>

      </h4>
      <h6>
        <div class="card-body p-3">
          <strong>name :</strong> <?= $oneProduct['name']  ?>
          <hr>
          <strong>price : $ </strong> <?= $oneProduct['price'] ?>
      </h6>
    </div>
  </div>
</div>
</div>
<?php endif; ?>

<h3 class="text-center text-light my-5">not ordered products</h3>
<section>
  <div class="card">
    <div class="card-body">
      <table class="table table-dark ">
        <thead>
          <td>id</td>
          <td>product name</td>
          <td>action</td>
        </thead>
        <?php foreach ($allNotOrderedProds as $item): ?>
        <tbody>
          <tr>
            <td><?= $count++ ?></td>
            <td><?= $item['name'] ?></td>
            <td>
              <!-- view -->
              <<a href="/INSTANT/TASK_2/data/products/noOrdered.php?view=<?= $item['id'] ?>">
                <i class="bi bi-eye text-info"></i>
                </a>

            </td>
          </tr>
        </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</section>
<!-- product modal -->

<!-- importing script -->
<?php include_once '../../shared/script.php' ?>