<?php
if (isset($_SESSION['us']) == false) 
{
    echo "<script>alert('You need to login')</script>";
    echo '<meta http-equiv="refresh" content="0;URL=?page=signin"/>';
}else{
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
</head>

<body>
    <div class="container">
        <h2>Order history</h2>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Receiver name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Order date</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delivery day</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $re1 = pg_query($conn, "Select * from orders where acc_name='{$_SESSION['us']}'");
                while ($row = pg_fetch_assoc($re1)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row['orderid']; ?></td>
                        <td><?php echo $row['receiver_name']; ?></td>
                        <td>
                            <?php echo $row['phone']; ?></td>
                        </td>
                        <td><?php echo $row['order_date']; ?></td>
                        <td>
                            <?php echo $row['delivery_address']; ?>
                        </td>
                        <td><?php echo  $row['total_price']; ?> $</td>
                        <td>
                            <?php 
                            if($row['status']==0){
                                echo "Processing";
                            }elseif($row['status']==1){
                                echo "Confirmed";
                            }elseif($row['status']==2){
                                echo "Complete";
                            }
                            else{
                                echo "Cancel";
                            }    
                            
                            ?>
                        </td>
                        <td>
                            <?php echo $row['delivery_date']; ?>
                        </td>
                        <td>
                            <a style="color: #272727; margin-left:30px;" href="?page=order_detail&&id=<?php echo $row["order_id"]; ?>">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </a>
                        </td>
                    </tr>
                <?php $no++;
                }
                ?>

            </tbody>
        </table>

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
<?php    
}
?>
