
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
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
                        <h5 class="card-title">Food Type Entry</h5>
                        
                        <div class="form-group">
                            <label for="txtname">Food Type Name</label>
                            <input type="text" class="form-control bg-white" name="txtname" id="txtname">
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
                <th>Food Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_foodtype";
            $res = $conn->query($selQry);
            $i = 0;
            while ($data = $res->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['foodtype_name'] ?></td>
                    <td><a href='Foodtype.php?did=<?php echo $data['foodtype_id'] ?>' class="btn btn-danger">Delete</a></td>
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