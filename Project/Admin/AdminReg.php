
<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btnsave']))
{
	$Name=$_POST['txtname'];
	$Email=$_POST['txtemail'];
	$Password=$_POST['txtpassword'];
	$insQry="insert into tbl_admin(admin_name,admin_email,admin_password)values('$Name','$Email','$Password')";
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
	$delQry="delete from tbl_admin where admin_id=".$_GET['did'];
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
<title>AdminRegistartion</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h2 class="card-title">User Registration</h2>
                        <div class="form-group">
                            <label for="txtname">Name</label>
                            <input type="text" class="form-control" name="txtname" id="txtname" />
                        </div>
                        <div class="form-group">
                            <label for="txtemail">Email</label>
                            <input type="text" class="form-control" name="txtemail" id="txtemail" />
                        </div>
                        <div class="form-group">
                            <label for="txtpassword">Password</label>
                            <input type="password" class="form-control" name="txtpassword" id="txtpassword" />
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" name="btnsave" id="btnsave" value="Save" />
                            <input type="submit" class="btn btn-secondary" name="btncancel" id="btncancel" value="Cancel" />
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
            <th>AdminName</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selQry = 'select * from tbl_admin';
        $result = $conn->query($selQry);
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $row['admin_name'] ?></td>
                <td><?php echo $row['admin_email'] ?></td>
                <td><?php echo $row['admin_password'] ?></td>
                <td><a href="AdminReg.php?did=<?php echo $row['admin_id'] ?>" class="btn btn-danger">Delete</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
   