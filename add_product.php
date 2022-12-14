<?php

function bind_Category_List($conn){
    $sqlstring = "select cate_id, cate_name from category";
    $result = pg_query($conn, $sqlstring);
    echo"<select name='CategoryList' class='form-control'style='width: 100%;
    height: 55px;
    border: 1px solid transparent;
    background: #ededed;
    color: #272727;
    padding: 0 20px;
    font-weight: 500;' >
            <option value='0'>Choose category</option>";
            while ($row = pg_fetch_array($result)){
                echo"<option value='".$row['cate_id']."'>".$row['cate_name']."</option>";
            }
    echo "</select>";
}

function bind_Sup_List($conn){
    $sqlstring = "select sup_id, sup_name from supplier";
    $result = pg_query($conn, $sqlstring);
    echo"<select name='SupList' class='form-control'style='width: 100%;
    height: 55px;
    border: 1px solid transparent;
    background: #ededed;
    color: #272727;
    padding: 0 20px;
    font-weight: 500;' >
            <option value='0'>Choose Supplier</option>";
            while ($row = pg_fetch_array($result)){
                echo"<option value='".$row['sup_id']."'>".$row['sup_name']."</option>";
            }
    echo "</select>";
}

if (isset($_POST['add'])) {

    include_once('./connect.php');

    $proid   = $_POST['txtID'];
    $proname = $_POST['txtName'];
    $procate      = $_POST['CategoryList'];
    $price      = $_POST['txtPrice'];
    $quantity      = $_POST['txtQty'];
    $proimage      = $_FILES['Image'];
    $description      = $_POST['txtShort'];
    $cost = $_POST['txtcost'];
    $sup = $_POST['SupList'];
    $store = $_POST['txtstore'];

    copy($proimage['tmp_name'], "./images/" . $proimage['name']);
    $filePic = $proimage['name'];
    $result = pg_query($conn, "INSERT INTO product(product_id,product_name,cate_id,product_price,product_quantity,product_picture,product_discription,cost,sup_id,store)
    VALUES('{$proid}','{$proname}','{$procate}',{$price},{$quantity},'{$filePic}','{$description}',{$cost}, {$sup},'{$store}')");
    if ($result) {
        echo "New addition was successful.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';   
    } else
        echo "An error occurred while adding new. <a href='?page=add_product'>Again</a>";
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

    <title>Runner</title>

</head>

<body>


    <div class="content">
        <section class="signup">
            <div class="container">
                <div class="signin-left">
                    <div class="sign-title">
                        <h1>Add product</h1>
                    </div>
                </div>
                <div class="signin-right ">
                    <form id="frmProduct" name="frmProduct" method="POST" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
                        <div class="username form-control1 ">
                            <input type="text" name="txtID" id="username" placeholder="ID">
                        </div>
                        <div class="password form-control1">
                            <input type="text" name="txtName" id="password" placeholder="Name">
                        </div>
                        <div class="fullname form-control1">
                            <div class="fullname form-control1">
                                    <?php
                                    bind_Category_List($conn);
                                    ?>
                            </div>
                        </div>
                        <div class="username form-control1 ">
                            <input type="text" name="txtPrice" id="username" placeholder="Price">
                        </div>
                        <div class="password form-control1">
                            <input type="text" name="txtQty" id="password" placeholder="Quantity">
                        </div>
                        <div class="fullname form-control1">
                            <input type="file" name="Image" id="fullname" placeholder="Image">
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtShort" id="fullname" placeholder="Description">
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtcost" id="fullname" placeholder="Cost">
                        </div>
                        <div class="fullname form-control1">
                            <div class="fullname form-control1">
                                    <?php
                                    bind_Sup_List($conn);
                                    ?>
                            </div>
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtstore" id="fullname" placeholder="Store">
                        </div>
                        <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                        <div>
                            <button class="submit" type="submit" name="add">
                                <p>Add</p>
                            </button>

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