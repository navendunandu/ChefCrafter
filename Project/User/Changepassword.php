<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
if(isset($_POST["btn_submit"]))
{
	$selQuery = "select * from tbl_user where user_id = '".$_SESSION["uid"]."'";
	$userData = $conn->query($selQuery);
	$userRow = $userData->fetch_assoc();
	$dbPassword = $userRow["user_password"];
	$oldPassword = $_POST["existing-password"];
	$newPassword = $_POST["new-password"];
	$confirm = $_POST["confirm-password"];
	
	if(($dbPassword == $oldPassword)&&($newPassword == $confirm))
	{
		$updateQuery = "update tbl_user set user_password ='".$newPassword."' where user_id='".$_SESSION["uid"]."'";
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

<div class="container">
  <form method="post">
    <table class="table">
      <tr>
        <td>Existing Password:</td>
        <td><input type="password" name="existing-password" class="form-control" required /></td>
      </tr>
      <tr>
        <td>New Password:</td>
        <td><input type="password" name="new-password" class="form-control" required /></td>
      </tr>
      <tr>
        <td>Confirm Password:</td>
        <td><input type="password" name="confirm-password" class="form-control" required /></td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="btn_submit" value="Submit" class="btn btn-primary" />
          <input type="reset" name="btn_reset" value="Reset" class="btn btn-secondary" />
        </td>
      </tr>
    </table>
  </form>
</div>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>


