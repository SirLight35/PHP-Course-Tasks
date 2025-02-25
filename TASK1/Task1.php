<?php
$show = false;
if(isset($_POST["print"])){
  $show = true;
  $username = $_POST["username"];
  $password = $_POST["password"];

}

















?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task1</title>
</head>

<body>

  <div class="container col-mid-6">
    <h2 class="text-center my-3">Login form</h2>
    <form action="" method="post">
      <div class="form-group">
        <input type="text" name="username" placeholder="your username" class="form-control my-3">
      </div>

      <div class="form-group">
        <input type="password" name="password" placeholder="your password" class="form-control my-3">
      </div>


      <div class="d-grid">
        <button name="print" class="btn btn-info mt-4">PRINT</button>
      </div>

    </form>
  </div>


  <?php   if($show):?>
  <div class="container col-md-5 my-5">

    <div class="text-center">
      <?php if($username=="mohamed" && $password=="123" )
        { 
          echo "Welcome to the website" ;
           }else{
            echo "Incorrect credentials, please try again";
           } ?>
    </div>
  </div>
  <?php endif;?>


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>