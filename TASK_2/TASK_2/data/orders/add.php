<?php


include_once '../../envi/database.php';

$selectOrder = "SELECT * FROM orders ORDER BY id DESC;";
$allOrder = mysqli_query($conn, $selectOrder);
$orders = mysqli_fetch_all($allOrder, MYSQLI_ASSOC);
$cusName = null;
$cusGender = null;
$phone = null;


?>

<?php include_once '../../shared/head.php' ?>


<?php include_once '../../shared/navbar.php'; ?>



<h2 class="text-center text-light my-5">Crud OP USING PHP ON Orders</h2>

<div class="container col-md-6">
  <div class="card">
    <div class="card-body">
      <form method="post">

        <div class="form-group">
          <input value="<?= $cusName ?>" name="cusName" type="text" placeholder="order Name" class="form-control mb-3">
        </div>
        <div class="form-group mb-4">
          <input value="<?= $cusGender ?>" type="text" name="cusGender" placeholder="Enter the order"
            class="form-control mb-3">

        </div>
        <div class="form-group">
          <input value="<?= $phone ?>" type="text" name="phone" class="form-control mb-3"
            placeholder="enter phone number">
        </div>
        <div class="d-grid">
          <button name="update" class="btn btn-warning mx-auto w-50 mb-2">Update</button>
          <button name="sendData" class="mx-auto w-50 btn btn-info">Add customer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include_once '../../shared/script.php'; ?>