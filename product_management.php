    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php
include_once("./connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $result = pg_query($conn,"SELECT product_picture from product where product_id='$id'");
        $image = pg_fetch_array($result);
        $del = $image["product_picture"];
        unlink("images/$del");
        pg_query($conn, "delete from product where product_id='$id'");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Supplier</th>
                    <th scope="col">Store</th>
                    <th  style="width:160px;"><a style="color: #272727;" href="?page=add_product" >
                        <i class="glyphicon glyphicon-plus"></i> Add new product</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $re1 = pg_query($conn, "SELECT * from product, supplier WHERE supplier.sup_id = product.sup_id");
                while($row = pg_fetch_assoc($re1)){
                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row["product_id"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["cate_id"]; ?></td>
                        <td><?php echo $row["product_price"]; ?></td>
                        <td><?php echo $row["product_quantity"]; ?></td>                       
                        <td>
                            <img src="./images/<?php echo $row["product_picture"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["product_discription"]; ?></td>
                        <td><?php echo $row["cost"]; ?></td>
                        <td><?php echo $row["sup_name"]; ?></td>
                        <td><?php echo $row["store"]; ?></td>   
                        <td>
                                <a style="color: #272727" href="?page=update_product&&id=<?php echo $row["product_id"]; ?>">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </a>
                                <a style="color: #272727; margin-left:30px;" href="?page=product_management&&function=del&&id=<?php echo $row["product_id"]; ?>" onClick="return confirm ('Are you sure delete')" >
                                    <i class="glyphicon glyphicon-remove"></i>
                                </a>
                        </td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>