

<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
{
	$district=$_POST['txt_district'];
	$insQry="insert into tbl_district(district_name) values('$district')";
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
	$delQry="delete from tbl_district where district_id=".$_GET['did'];
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
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