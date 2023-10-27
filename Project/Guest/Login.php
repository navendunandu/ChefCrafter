<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/connection/connection.php");
session_start();
ob_start();
include('Head.php');
if(isset($_POST['btnlogin']))
{
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	$selUser="select * from tbl_user where user_email='".$email."' and user_password='".$password."'";
	$seladmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$selchef="select * from tbl_chef where chef_email='".$email."' and chef_password='".$password."'";
	//AdminQuery
	//chef
	$resUser=$conn->query($selUser);
	$resadmin=$conn->query($seladmin);
	$reschef=$conn->query($selchef);
	if($resUser->num_rows>0)
	{
		$row=$resUser->fetch_assoc();
		$_SESSION['uid']=$row['user_id'];
		$_SESSION['uname']=$row['user_name'];
		header("location: ../User/Homepage.php");
	}
	else if($resadmin->num_rows>0)
	{
		$row=$resadmin->fetch_assoc();
		$_SESSION['aid']=$row['admin_id'];
		$_SESSION['adname']=$row['admin_name'];
		header("location: ../Admin/Homepage.php");
		//Admin Connection
	}
	else if($reschef->num_rows>0)
	{
		$row=$reschef->fetch_assoc();
		if($row['chef_vstatus']==0)
		{
			?>
			<script>
			alert('Not Verified By Admin')
			</script>
			<?php
		}
		else if($row['chef_vstatus']==1)
		{		
			$_SESSION['cid']=$row['chef_id'];
			$_SESSION['cname']=$row['chef_name'];
			header("location: ../chef/Homepage.php");
		}
		else
		{
			?>
			<script>
			alert(' Rejected By Admin')
			</script>
			<?php
		}
	}
	else
	{
		echo "Invalid Credentials";
	}
}

?>
<div class="row justify-content-center" style="padding-bottom:5rem;">
        <div class="col-md-4">
            <form id="form1" name="form1" method="post" action="">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="txtemail">Email</label>
                            <input type="text" class="form-control" name="txtemail" id="txtemail">
                        </div>
                        <div class="form-group">
                            <label for="txtpassword">Password</label>
                            <input type="password" class="form-control" name="txtpassword" id="txtpassword">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btnlogin" id="btnlogin">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>