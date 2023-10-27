<?php
include("../Assets/Connection/connection.php");
ob_start()
include('Head.php');

if(isset($_POST["btn_submit"]))
{
	$selQuery = "select * from tbl_chef where chef_id = '".$_SESSION["cid"]."'";
	$chefData = $conn->query($selQuery);
	$chefRow = $chefData->fetch_assoc();
	$dbPassword = $chefRow["chef_password"];
	$oldPassword = $_POST["existing-password"];
	$newPassword = $_POST["new-password"];
	$confirm = $_POST["confirm-password"];
	
	if(($dbPassword == $oldPassword)&&($newPassword == $confirm))
	{
		$updateQuery = "update tbl_chef set chef_password ='".$newPassword."' where chef_id='".$_SESSION["cid"]."'";
		if($conn->query($updateQuery))
		{
			echo "Updation Success";
		}
		else
		{
			echo "Updation Failed";
		}
	}
	else
	{
		echo "Invalid entry";
	}
}


 ?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<div class="container mt-4">
    <form method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Change Password</h5>
                        <div class="form-group">
                            <label for="existing-password">Existing Password</label>
                            <input type="password" class="form-control" name="existing-password" id="existing-password" />
                        </div>
                        <div class="form-group">
                            <label for="new-password">New Password</label>
                            <input type="password" class="form-control" name="new-password" id="new-password" />
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm-password" id="confirm-password" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                            <button type="reset" class="btn btn-secondary" name="btn_reset" id="btn_reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
</html>



<?php
ob_flush();
include("Foot.php");

?>