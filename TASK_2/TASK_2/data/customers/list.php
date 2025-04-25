<?php

$count = 1;
include_once '../../envi/database.php';


$selectCustomers = "SELECT * FROM customers ORDER BY id DESC;";
$allCustomers = mysqli_query($conn, $selectCustomers);
$customers = mysqli_fetch_all($allCustomers, MYSQLI_ASSOC);



//READ 

$selectCustomers = "SELECT * FROM customers";
$allCustomers = mysqli_query($conn, $selectCustomers);
$customers = mysqli_fetch_all($allCustomers, MYSQLI_ASSOC);


//REad one item by id

if (isset($_GET['view'])) {
  $id = $_GET['view'];
  $selectOneCustomer = "SELECT * FROM customers WHERE id=$id";
  $selectOneCustomerItem = mysqli_query($conn, $selectOneCustomer);
  $oneCustomer = mysqli_fetch_assoc($selectOneCustomerItem);
}




//Delete

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $delete = " DELETE FROM customers WHERE id = $id";
  mysqli_query($conn, $delete);
  header("location: main.php");
}


//Edit
$cusName = null;
$cusGender = null;
$phone = null;
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $selectOneCustomer = "SELECT * FROM customers WHERE id=$id";
  $selectOneCustomerItem = mysqli_query($conn, $selectOneCustomer);
  $oneCustomer = mysqli_fetch_assoc($selectOneCustomerItem);
  $cusName = $oneCustomer['name'];
  $cusGender = $oneCustomer['gender'];
  $phone = $oneCustomer['phone'];
  if (isset($_POST['update'])) {
    $cusName = $_POST['cusName'];
    $cusGender = $_POST['cusGender'];
    $phone = $_POST['phone'];
    $update = "UPDATE customers SET name = '$cusName', gender = '$cusGender', phone = $phone where id=$id";
    mysqli_query($conn, $update);
    header("location: main.php");
  }
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
        <a href="/INSTANT/TASK_2/data/customers/list.php"><i class=" float-end fa-solid fa-rectangle-xmark"></i></a>
      </h6>
      <div class="card-body p-3">
        <h6>id : <?= $oneCustomer['id'] ?></h6>
        <hr>
        <h6>Name : <?= $oneCustomer['name'] ?></h6>
        <hr>
        <h6>gender : <?= $oneCustomer['gender'] ?></h6>
        <hr>
        <h6>phone : <?= $oneCustomer['phone'] ?></h6>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>


<h2 class="text-center text-light my-5">List All Customers</h2>
<div class="tex-center text-light my-5">
  <div class="container col-md-5">
    <div class="card">
      <div class="car-body">
        <table class="table table-dark" id="tt">
          <tr>
            <th>id</th>
            <th>name</th>
            <th colspan="3">Action</th>

            <?php foreach ($customers as $item): ?>
          <tr>
            <th><?= $count++ ?></th>
            <th><?= $item['name'] ?></th>
            <th><a href="/INSTANT/TASK_2/data/customers/list.php?view=<?= $item['id'] ?>"><i
                  class="text-info fa-solid fa-eye text-success	"></i></a>
            </th>
            <th><a href="/INSTANT/TASK_2/data/customers/add.php?edit=<?= $item['id'] ?>"><i
                  class="fa-solid fa-pen-to-square text-success"></i></a>
            </th>
            </th>
            <th><a href="/INSTANT/TASK_2/data/customers/list.php?delete=<?= $item['id'] ?>"><i
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