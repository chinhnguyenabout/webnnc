<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php

include_once("./connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        pg_query($conn, "delete from supplier where sup_id='$id'");
    }
}


$sql1 = "SELECT * from supplier";
$re1 = pg_query($conn, $sql1);
?>
<div class="container mb-3">

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th style="width:160px;"><a style="color: #272727;" href="?page=add_sup">
                        <i class="glyphicon glyphicon-plus"></i> Add new Supplier</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = pg_fetch_assoc($re1)) {
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?= $row['sup_id'] ?></td>
                    <td><?= $row['sup_name'] ?></td>
                    <td>
                        <a style="color: #272727" href="?page=update_sup&&id=<?php echo $row["sup_id"]; ?>">
                            <i class="glyphicon glyphicon-pencil"></i>
                        </a>
                        <a style="color: #272727; margin-left:30px;" href="?page=sup_management&&function=del&&id=<?php echo $row["sup_id"]; ?>" onClick="return confirm ('Are you sure delete')">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </td>
                </tr>
            <?php $no++;
            }
            ?>
        </tbody>
    </table>
</div>