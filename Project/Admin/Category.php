
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btnsubmit']))
{
	$Category=$_POST['txtcategory'];
	$insQry="insert into tbl_category(category_name)values('$Category')";
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
	$delQry="delete from  tbl_category  where category_id=".$_GET['did'];
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

<form id="form1" name="form1" method="post" action="">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="card-title">Category Entry</h2>
                        <div class="form-group">
                            <label for="txtcategory">Category</label>
                            <input type="text" class="form-control" name="txtcategory" id="txtcategory" />
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btnsubmit" id="btnsubmit" value="Save" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th>Sl.no</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selQry = 'select * from tbl_category';
        $result = $conn->query($selQry);
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><a href="Category.php?did=<?php echo $row['category_id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

 <?php
include('Foot.php');
ob_flush();
?>