<?php

if (isset($_POST['add'])) {

    include_once('./connect.php');

    $id   = $_POST['txtId'];
    $name  = $_POST['txtName'];

    $result = pg_query($conn, "INSERT INTO supplier(sup_id,sup_name) VALUES ('{$id}','{$name}')");

    if ($result) {
        echo "New addition was successful. <a href='?page=supplier_management'>Back</a>";
    } else
        echo "An error occurred while adding new. <a href='supplier_management.php'>Try again</a>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="plugins/animate/animate.min.css">
  <link rel="stylesheet" href="plugins/fontawesome/all.css">
  <link rel="stylesheet" href="plugins/webfonts/font.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <link rel="icon" type="image/x-icon" href="./images/logo.png">


  <link rel="stylesheet" href="plugins/uikit/uikit.min.css" />
  <link rel="stylesheet" href="css/sign.css">

  <title>CH Store</title>

</head>

<body>


 
  <div class="content">
    <section class="signup">
        <div class="container">
            <div class="signin-left">
                <div class="sign-title">
                    <h1>Add supplier</h1>
                </div>
            </div>
            <div class="signin-right ">
                <form action="" method="POST">
                    <div class="username form-control1 ">
                        <input type="text" name="txtId"  id="fullname" placeholder="ID">
                    </div>
                    <div class="password form-control1">
                        <input type="text" name="txtName" id="fullname" placeholder="Name">
                      <button class="submit" type="submit" name="add"><p>Add</p></button>
                       
                    </div>
                    <div class="backto">
                      <a href=""><i class="fa fa-long-arrow-alt-left"></i>Go back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>    
    <section class="section section-gallery">
      <div class="">
        <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
          <h2 style="text-align:center;padding-top: 10px">
            <a style="font-size: 28px;color: black;text-decoration: none" href="">Customers and Runner Inn</a>
          </h2>
        </div>
        <div class="list-gallery clearfix">
          <ul class="shoes-gp">
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_1.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_2.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_3.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_4.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_5.jpg" alt="">
              </div>
            </li>
            <li>
              <div class="gallery_item">
                <img class="img-resize" src="images/shoes/gallery_item_6.jpg" alt="">
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>
 
  <script async defer crossorigin="anonymous" src="plugins/sdk.js"></script>
  <script src="plugins/jquery-3.4.1/jquery-3.4.1.min.js"></script>
  <script src="plugins/bootstrap/popper.min.js"></script>
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <script src="plugins/owl.carousel/owl.carousel.min.js"></script>
  <script src="js/home.js"></script>
  <script src="js/script.js"></script>
  <script src="plugins/uikit/uikit.min.js"></script>
  <script src="plugins/uikit/uikit-icons.min.js"></script>
</body>

</html>