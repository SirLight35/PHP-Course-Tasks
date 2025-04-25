<?php

$count = 1;
include_once '../../envi/database.php';




//READ 

$selectOrders = "SELECT * FROM orders ORDER BY id DESC;";
$allOrders = mysqli_query($conn, $selectOrders);
$oneOrder = mysqli_fetch_all($allOrders, MYSQLI_ASSOC);



//REad one item by id

if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneOrder = "SELECT * FROM orders WHERE id=$id";
  $selectOneOrderItem = mysqli_query($conn, $selectOneOrder);
  $oneOrder = mysqli_fetch_assoc($selectOneOrderItem);
}




//Delete

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = " DELETE FROM orders WHERE id = $id";
  mysqli_query($conn, $delete);
  header("location: main.php");
}



?>



<?php include_once '../../shared/head.php' ?>


<?php include_once '../../shared/navbar.php'; ?>


<?php if (isset($_GET['view'])): ?>
<div class="mymodel">
  <div class="myContent">
    <div class="card p-3">
      <h6>
        List View Customers
        <a href="/INSTANT/TASK_2/data/orders/list.php"><i class=" float-end fa-solid fa-rectangle-xmark"></i></a>
      </h6>
      <div class="card-body p-3">
        <strong>product : </strong> <?= $oneOrder['productID'] ?>
        <hr>
        <strong>total : </strong>$ <?= $oneOrder['orderAmount'] ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<h2 class="text-center text-light my-5">List All Orders</h2>
<div class="tex-center text-light my-5">
  <div class="container col-md-5">
    <div class="card">
      <div class="car-body">
        <table class="table table-dark" id="tt">
          <tr>
            <th>id</th>
            <th>product ID</th>
            <th>order amount</th>
            <th colspan="3">Action</th>

            <?php foreach ($oneOrder as $item): ?>
          <tr>
            <th><?= $count++ ?></th>
            <td><?= $item['productID'] ?></td>
            <td><?= $item['orderAmount'] ?></td>
            <th><a href="/INSTANT/TASK_2/data/orders/list.php?view=<?= $item['id'] ?>"><i
                  class="text-info fa-solid fa-eye text-success	"></i></a>
            </th>
            <th><a href="/INSTANT/TASK_2/data/orders/add.php?edit=<?= $item['id'] ?>"><i
                  class="fa-solid fa-pen-to-square text-success"></i></a>
            </th>
            </th>
            <th><a href="/INSTANT/TASK_2/data/orders/list.php?delete=<?= $item['id'] ?>"><i
                  class="fa-solid fa-trash text-danger"></i></i></a>
            </th>
          </tr>
          <?php endforeach; ?>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>











<?php include_once '../../shared/script.php'; ?>