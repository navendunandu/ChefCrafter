
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btnsubmit']))
{
	$Foodtype=$_POST['txtname'];
	$insQry="insert into tbl_foodtype(foodtype_name)values('$Foodtype')";
	if($conn->query($insQry))
	{
		echo "Inserted";
	}
	else{
		echo "Failed";
	}
}

if(isset($_GET['did']))
{
	$delQry="delete from tbl_foodtype  where foodtype_id=".$_GET['did'];
		if($conn->query($delQry))
		{
			echo "";
		}
		else 
		{
			echo "failed";
		}
}
?>
<div class="container mt-4">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Food Entry</h5>
                        <div class="form-group">
                            <label for="selcat">Category</label>
                            <select class="form-control" name="selcat" id="selcat">
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
                        </div>
                        <div class="form-group">
                            <label for="seltype">Food Type</label>
                            <select class="form-control" name="seltype" id="seltype">
                                <option value="">Select Food Type</option>
                                <?php
                                $selType = "select * from tbl_foodtype";
                                $resType = $conn->query($selType);
                                while ($dataType = $resType->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $dataType['foodtype_id'] ?>"><?php echo $dataType['foodtype_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_food">Food Name</label>
                            <input type="text" class="form-control" name="txt_food" id="txt_food">
                        </div>
                        <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered table-striped mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Sl.No</th>
                <th>Food Name</th>
                <th>Category</th>
                <th>Food Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_food f inner join tbl_category c on c.category_id=f.category_id inner join tbl_foodtype ft on ft.foodtype_id=f.foodtype_id";
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
                    <td><a href='Food.php?id=<?php echo $data['food_id'] ?>' class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include('Foot.php');
ob_flush();
?>