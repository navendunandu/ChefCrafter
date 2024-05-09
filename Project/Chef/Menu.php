<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btn_submit'])){
    $photo=$_FILES['photo']['name'];
    $path=$_FILES['photo']['tmp_name'];
    $insQry="insert into tbl_menu(food_id,chef_id,menu_rate,menu_photo) values('".$_POST['selfood']."','".$_SESSION['cid']."','".$_POST['txtrate']."','".$photo."')";
    if($conn->query($insQry)){
        move_uploaded_file($path,'../Assets/File/Chef/Menu/'.$photo);
        ?>
        <script>
            alert('Menu Inserted')
            window.location='Menu.php'
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed')
        </script>
        <?php
    }
}

if(isset($_GET['mid'])){
    $delQry="delete from tbl_menu where menu_id=".$_GET['mid'];
    if($conn->query($delQry)){
        ?>
        <script>
            alert('Deleted')
            window.location='Menu.php'
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed')
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
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered">
            <tr>
                <td>Category</td>
                <td>
                    <select class="form-control" name="selcat" id="selcat" onchange="getFood()">
                        <option value="">Select Category</option>
                        <?php
                        $selCat = "select * from tbl_category";
                        $resCat = $conn->query($selCat);
                        while ($dataCat = $resCat->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $dataCat['category_id'] ?>"><?php echo $dataCat['category_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Food Type</td>
                <td>
                    <select class="form-control" name="selft" id="selft" onchange="getFood()">
                        <option value="">Select Food Type</option>
                        <?php
                        $selFt = "select * from tbl_foodtype";
                        $resFt = $conn->query($selFt);
                        while ($dataFt = $resFt->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $dataFt['foodtype_id'] ?>"><?php echo $dataFt['foodtype_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Food</td>
                <td>
                    <select class="form-control" name="selfood" id="selfood">
                        <option value="">None</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Rate/Plate</td>
                <td><input class="form-control" type="text" name="txtrate" id="txtrate"></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><input class="form-control" type="file" name="photo" id="photo"></td>
            </tr>
            <tr>
                <td colspan="2"><input class="btn btn-primary" type="submit" value="Submit" name="btn_submit"></td>
            </tr>
        </table>
    </form>
</div>

<div class="container mt-4">
    <table class="table table-bordered">
        <tr>
            <td>Sl.No</td>
            <td>Food</td>
            <td>Category</td>
            <td>Food Type</td>
            <td>Rate</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        <?php
        $selQry = "select * from tbl_menu m inner join tbl_food f on f.food_id=m.food_id inner join tbl_category c on c.category_id=f.category_id inner join tbl_foodtype ft on ft.foodtype_id=f.foodtype_id where chef_id=" . $_SESSION['cid'];
        $res = $conn->query($selQry);
        $i = 0;
        while ($data = $res->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['food_name'] ?></td>
                <td><?php echo $data['category_name'] ?></td>
                <td><?php echo $data['foodtype_name'] ?></td>
                <td><?php echo $data['menu_rate'] ?></td>
                <td><img src="../Assets/File/Chef/Menu/<?php echo $data['menu_photo'] ?>" class="img-thumbnail" alt="Food Image" width="200" height="150"></td>
                <td><a class="btn btn-danger" href='Menu.php?mid=<?php echo $data['menu_id'] ?>'>Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<?php
include('Foot.php');
ob_flush();
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    function getFood()
    {
        var cat=document.getElementById('selcat').value;
        var ft=document.getElementById('selft').value;
        $.ajax({url: "../Assets/AjaxPages/AjaxFood.php?cid=" + cat+'&fid='+ft,
        success: function(result) {
            $("#selfood").html(result);
        }});
    }
</script>
</html>