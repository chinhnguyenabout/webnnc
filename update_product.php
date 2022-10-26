<?php
//Nhúng file kết nối với database
include_once('./connect.php');
//Get id
$id = $_GET['id'];
$sqlstring = "SELECT * FROM product WHERE product_id = '$id' ";

$result = pg_query($conn, $sqlstring);
$row = pg_fetch_assoc($result);
$procate = $row['cate_id'];
function bind_Category_List($conn, $selectedValue)
{
    $sqlstring = "SELECT cate_id, cate_name FROM category";
    $result = pg_query($conn, $sqlstring);
    echo "<select name='CategoryList' class='form-control'style='width: 100%;
    height: 55px;
    border: 1px solid transparent;
    background: #ededed;
    color: #272727;
    padding: 0 20px;
    font-weight: 500;' >
        <option value='0'>Chose category</option>";
    while ($row = pg_fetch_assoc($result)) {
        if ($row['Cate_ID'] == $selectedValue) {
            echo "<option value='" . $row['cate_id'] . "' selected>" . $row['cate_name'] . "</option>";
        } else {
            echo "<option value='" . $row['cate_id'] . "'>" . $row['cate_name'] . "</option>";
        }
    }
    echo "</select>";
}

function bind_Sup_List($conn, $selectedValue)
{
    $sqlstring = "SELECT sup_id, sup_name FROM supplier";
    $result = pg_query($conn, $sqlstring);
    echo "<select name='SupList' class='form-control'style='width: 100%;
    height: 55px;
    border: 1px solid transparent;
    background: #ededed;
    color: #272727;
    padding: 0 20px;
    font-weight: 500;' >
        <option value='0'>Chose category</option>";
    while ($row = pg_fetch_assoc($result)) {
        if ($row['sup_id'] == $selectedValue) {
            echo "<option value='" . $row['sup_id'] . "' selected>" . $row['sup_name'] . "</option>";
        } else {
            echo "<option value='" . $row['sup_id'] . "'>" . $row['sup_name'] . "</option>";
        }
    }
    echo "</select>";
}

$sql_store = "SELECT * FROM product";
$query_store = pg_query($conn, $sql_store);

$result = pg_query($conn, "SELECT* FROM product WHERE product_id='{$id}'");
$row = pg_fetch_assoc($result);

$oldpic = $row['product_picture'];


if (isset($_POST['Update'])) {



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

    if ($proimage['name'] == '') {
        $result = pg_query($conn, "UPDATE product
        SET product_name='{$proname}',product_price={$price},product_quantity={$quantity},cate_id='{$procate}',product_discription='{$description}',cost='{$cost}',sup_id='{$sup}',store='{$store}'
        WHERE product_id='$id'");
        if ($result) {
            echo "The update is successful.";
            echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
        } else
            echo "An error occurred during the update. <a href='?page=product'>Again</a>";
    } else {
        copy($proimage['tmp_name'], "./images/" . $proimage['name']);
        unlink("images/$oldpic");
        $filePic = $proimage['name'];
        $result = pg_query($conn, "UPDATE product 
        SET product_ame='{$proname}',product_rice={$price},product_quantity={$quantity},cate_id='{$procate}',product_picture='{$filePic}',product_discription='{$description}',cost='{$cost}',sup_id='{$sup}',store='{$store}'
        WHERE product_id='$id'");
        if ($result) {
            echo "The update is successful.";
            echo '<meta http-equiv="refresh" content="0;URL=?page=product_management"/>';
        } else
            echo "An error occurred during the update. <a href='?page=product'>Again</a>";
    }
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
                            <input type="text" name="txtID" id="username" placeholder="ID" value='<?php echo $row['product_id'] ?>' readonly>
                        </div>
                        <div class="password form-control1">
                            <input type="text" name="txtName" id="password" placeholder="Name" value='<?php echo $row['product_name'] ?>'>
                        </div>
                        <div class="fullname form-control1">
                            <div class="fullname form-control1">
                                <?php bind_Category_List($conn, $procate); ?>
                            </div>
                        </div>
                        <div class="username form-control1 ">
                            <input type="text" name="txtPrice" id="username" placeholder="Price" value='<?php echo $row['product_price'] ?>'>
                        </div>
                        <div class="password form-control1">
                            <input type="text" name="txtQty" id="password" placeholder="Quantity" value='<?php echo $row['product_quantity'] ?>'>
                        </div>
                        <div class="fullname form-control1">
                            <input type="file" name="Image" id="fullname" placeholder="Image">
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtShort" id="fullname" placeholder="Description" value='<?php echo $row['product_discription'] ?>'>
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtcost" id="fullname" placeholder="Cost" value='<?php echo $row['cost'] ?>'>
                        </div>
                        <div class="fullname form-control1">
                            <div class="fullname form-control1">
                                <?php bind_Sup_List($conn, $procate); ?>
                            </div>
                        </div>
                        <div class="fullname form-control1">
                            <input type="text" name="txtstore" id="fullname" placeholder="Store" value='<?php echo $row['store'] ?>'>
                        </div>
                        <div class="recaptcha form-control1">This site is protected by reCAPTCHA and the Google <a href="">Privacy Policy</a> and <a href="">Terms of Service</a> apply.</div>
                        <div>
                            <button class="submit" type="submit" name="Update">
                                <p>Update</p>
                            </button>

                        </div>
                        <div class="backto">
                            <a href=""><i class="fa fa-long-arrow-alt-left"></i> Quay lại trang chủ</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="section section-gallery">
            <div class="">
                <div class="hot_sp" style="padding-top: 70px;padding-bottom: 50px;">
                    <h2 style="text-align:center;padding-top: 10px">
                        <a style="font-size: 28px;color: black;text-decoration: none" href="">Khách hàng và Runner Inn</a>
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