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

  <title>CH Store</title>

</head>
<?php
include_once("./connect.php");

?>

<body>


  <div class="owl-carousel owl-theme owl-carousel-setting">
    <div class="item"><img src="images/slideshow.jpg" class="d-block w-100" alt="..."></div>
    <div class="item"><img src="images/banner_cc5f52c9.jpg" class="d-block w-100" alt="..."></div>
  </div>


  <div class="content">
    <div class="container">
      <div class="hot_sp" style="padding-bottom: 10px;">
        <h2 style="text-align:center;padding-top: 10px">
          <a style="font-size: 28px;color: black;text-decoration: none" href="">Selling products</a>
        </h2>
      </div>
    </div>

    <div class="container" style="padding-bottom: 50px;">
      <div class="row">
        <?php
        $result = pg_query($conn, "Select * from product ORDER BY product_id LIMIT 4 ");
        while ($row = pg_fetch_assoc($result)) {
        ?>
          <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
              <div class="product-img fade-box" style="border: double;">
                <a href="#" title="Adidas EQT Cushion ADV" class="img-resize">
                  <img style="height: 700px; width:700px" src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                  <img style="height: 700px; width:700px" src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                </a>
              </div>
              <div class="product-detail clearfix">
                <div class="pro-text">
                  <a style=" color: black;
                  font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration pack>
                    <?php echo $row["product_name"]; ?>
                  </a>
                </div>
                <div class="pro-price">
                  <a style="color:black" href="?page=cart&&id=<?php echo $row["product_id"]; ?>"><?php echo $row["product_price"]; ?>$ <img style="height: 20px; width:20px" src="images/add_to_cart.png"></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      <div class="row">
        <?php
        $result = pg_query($conn, "Select * from product ORDER BY product_name DESC LIMIT 4 ");
        while ($row = pg_fetch_array($result)) {
        ?>
          <div class="col-md-3 col-sm-6 col-xs-6 col-6">
            <div class="product-block">
              <div class="product-img fade-box" style="border: double;">
                <a href="#" title="Adidas EQT Cushion ADV" class="img-resize">
                  <img style="height: 700px; width:700px" src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                  <img style="height: 700px; width:700px" src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas EQT Cushion ADV" class="lazyloaded">
                </a>
              </div>
              <div class="product-detail clearfix">
                <div class="pro-text">
                  <a style=" color: black;
                  font-size: 14px;text-decoration: none;" href="#" title="Adidas EQT Cushion ADV" inspiration pack>
                    <?php echo $row["product_name"]; ?>
                  </a>
                </div>
                <div class="btn btn-outline-primary">
                  <a style="color:black" href="?page=cart&&id=<?php echo $row["product_id"]; ?>"><?php echo $row["product_price"]; ?>$ <img style="height: 20px; width:20px" src="images/add_to_cart.png"></a>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <section class="section wrapper-home-banner">
      <div class="container-fluid" style="padding-bottom: 50px;">
        <div class="row">
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="images/shoes/block_home_category1_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Product</p>
                  <h2>
                    Brand Ambassador
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="#" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image fade-box">
                  <img class="lazyloaded" src="images/shoes/block_home_category2_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p>Product</p>
                  <h2>
                    Trademark
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 home-banner-pd">
            <div class="block-banner-category">
              <a href="?page=introduce" class="link-banner wrap-flex-align flex-column">
                <div class="fg-image">
                  <img class="lazyloaded" src="images/shoes/block_home_category3_grande.jpg" alt="Shoes">
                </div>
                <figcaption class="caption_banner site-animation">
                  <p></p>
                  <h2>
                    About us
                  </h2>
                </figcaption>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="content">
        <div class="container">
          <div class="hot_sp">
            <h2 style="text-align:center;">
              <a style="font-size: 28px;color: black;text-decoration: none" href="">New product</a>
            </h2>
            <div class="view-all" style="text-align:center;">
              <a style="color: black;text-decoration: none" href="">See more</a>
            </div>
          </div>
        </div>
      </div>
      <div class="container product" style="width: 100%;margin: auto;">
        <div class="owl-carousel owl-theme owl-product-setting">
          <?php
          $result = pg_query($conn, "Select * from product ORDER BY product_name");
          while ($row = pg_fetch_array($result)) {
          ?>
            <div class="item">
              <div class="">
                <div class="product-block">
                  <div class="product-img fade-box">
                    <a href="#" title="Adidas Ultraboost W" class="img-resize">
                      <img src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas Ultraboost W" class="lazyloaded">
                      <img src="images/<?php echo $row["product_picture"]; ?>" alt="Adidas Ultraboost W" class="lazyloaded">
                    </a>
                  </div>
                  <div class="product-detail clearfix">
                    <div class="pro-text">
                      <a style=" color: black;
                           font-size: 14px;text-decoration: none;" href="#" title="Adidas Ultraboost W" inspiration pack>
                        <?php echo $row["product_name"]; ?>
                      </a>
                    </div>
                    <div class="pro-price">
                      <a style="color:black" href="?page=cart&&id=<?php echo $row["product_id"]; ?>"><?php echo $row["product_price"]; ?>$<img style="height: 20px; width:20px; margin-left:151px;" src="images/add_to_cart.png"></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          ?>

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