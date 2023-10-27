<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save'])){
    $insQry="insert into tbl_food(food_name,category_id,foodtype_id) values('".$_POST['txt_food']."','".$_POST['selcat']."','".$_POST['seltype']."')";
    if($conn->query($insQry)){
        ?>
        <script>
            alert('Inserted Successfully')
            window.location='Food.php'
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Inserted Failed')
        </script>
        <?php
    }
}
if(isset($_GET['id'])){
    $delQry="delete from tbl_food where food_id=".$_GET['id'];
    if($conn->query($delQry)){
        ?>
        <script>
            alert('Deleted Successfully')
            window.location='Food.php'
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Deleted Failed')
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-4">
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">District Entry</h5>
                        <div class="form-group">
                            <label for="txt_district">District</label>
                            <input type="text" class="form-control" name="txt_district" id="txt_district" />
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Sl.no</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = 'select * from tbl_district';
            $result = $conn->query($selQry);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['district_name'] ?></td>
                    <td><a href="District.php?did=<?php echo $row['district_id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>