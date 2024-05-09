<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
$selchefQuery = "select * from tbl_chef where chef_id = '".$_SESSION["cid"]."'";
$chefData = $conn->query($selchefQuery);
$chefRow = $chefData->fetch_assoc();

if(isset($_POST["btn_submit"]))
{
	$name = $_POST["chef-name"];
	$contact = $_POST["chef-contact"];
	$email = $_POST["chef-email"];
	$address = $_POST["chef-address"];
	$updateQuery = "update tbl_chef set chef_name = '".$name."', chef_email = '".$email."', chef_contact = '".$contact."',chef_address='".$address."' where chef_id='".$_SESSION["cid"]."'";
	if($conn->query($updateQuery))
	{
		echo "Updation Success";
	} 
	else
	{
		echo "Updation Failed";
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
<div class="container mt-5">
        <form method="post">
            <div class="form-group row">
                <label for="chef-name" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $chefRow["chef_name"] ?>" name="chef-name" id="chef-name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="chef-email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $chefRow["chef_email"] ?>" name="chef-email" id="chef-email" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="chef-address" class="col-sm-2 col-form-label">Address:</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $chefRow["chef_address"]?>" name="chef-address" id="chef-address" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="chef-contact" class="col-sm-2 col-form-label">Contact:</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $chefRow["chef_contact"]?>" name="chef-contact" id="chef-contact" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" value="Submit" name="btn_submit" id="btn_submit" class="btn btn-primary">
                    <input type="reset" value="Reset" name="btn_reset" id="btn_reset" class="btn btn-secondary">
                </div>
            </div>
        </form>
        <a href="./Changepassword.php">Change Password</a>
    </div>
</body>
</html>


<?php
ob_flush();
include("Foot.php");

?>