<?php


include_once '../../envi/database.php';

$selectCustomers = "SELECT * FROM customers ORDER BY id DESC;";
$allCustomers = mysqli_query($conn, $selectCustomers);
$customers = mysqli_fetch_all($allCustomers, MYSQLI_ASSOC);
$cusName = null;
$cusGender = null;
$phone = null;
//Create
if (isset($_POST['sendData'])) {
  $cusName = $_POST['cusName'];
  $cusGender = $_POST['cusGender'];
  $phone = $_POST['phone'];
  $insert = "INSERT INTO customers VALUES(null,'$cusName','$cusGender',$phone)";
  mysqli_query($conn, $insert);

  header("Location: main.php");
  exit();
}
?>



<?php include_once '../../shared/head.php' ?>


<?php include_once '../../shared/navbar.php'; ?>



<h2 class="text-center text-light my-5">Crud OP USING PHP ON Customers</h2>

<div class="container col-md-6">
  <div class="card">
    <div class="card-body">
      <form method="post">

        <div class="form-group">
          <input value="<?= $cusName ?>" name="cusName" type="text" placeholder="Customer Name"
            class="form-control mb-3">
        </div>
        <div class="form-group mb-4">
          <input value="<?= $cusGender ?>" type="text" name="cusGender" placeholder="Enter the Gender"
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