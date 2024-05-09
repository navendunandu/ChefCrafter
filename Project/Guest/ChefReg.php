

<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
{
	$Name=$_POST['txt_name'];
	$Contact=$_POST['txt_contact'];
	$Email=$_POST['txt_email'];
	$Address=$_POST['txt_address'];
	$Password=$_POST['txt_password'];
  $place=$_POST['selplace'];
  $Photo=$_FILES['file_photo']["name"];
	$path=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,"../Assets/File/Chef/Photo/".$Photo);
  
  $proof=$_FILES['file_proof']["name"];
	$pathproof=$_FILES['file_proof']['tmp_name'];
	move_uploaded_file($pathproof,"../Assets/File/Chef/Proof/".$proof);
	
	
		$insQry="insert into tbl_chef(chef_name,chef_contact,chef_email,chef_address,chef_password,chef_photo,chef_proof,place_id)values('".$Name."','".$Contact."','".$Email."','".$Address."','".$Password."','".$Photo."','".$proof."','".$place."')";
	if($conn->query($insQry))
	{
		echo "Inserted";
	}
	else{
		echo "Failed";
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
    <div class="row justify-content-center">
        <div class="col-md-4">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Registration</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="txt_name">Name</label>
                            <input type="text" class="form-control" required name="txt_name" id="txt_name">
                        </div>
                        <div class="form-group">
                            <label for="txt_contact">Contact</label>
                            <input type="number" class="form-control" required name="txt_contact" id="txt_contact">
                        </div>
                        <div class="form-group">
                            <label for="txt_email">Email</label>
                            <input type="email" class="form-control" required name="txt_email" id="txt_email">
                        </div>
                        <div class="form-group">
                            <label for="txt_address">Address</label>
                            <input type="text" class="form-control"  required name="txt_address" id="txt_address">
                        </div>
                        <div class="form-group">
                            <label for="selDistrict">District</label>
                            <select class="form-control" required name="selDistrict" id="selDistrict" onchange='getPlace(this.value)'>
                                <option value="">Select District</option>
        		 <?php
								$selQry='select * from tbl_district';
								$result=$conn->query($selQry);
								while($row=$result->fetch_assoc())
									{
        		?>
                
                	<option value="<?php echo $row['district_id']?>"><?php echo $row['district_name']?></option>
        						<?php
									}
									?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selplace">Place</label>
                            <select class="form-control" required name="selplace" id="selplace">
                                <option value="">---Select---</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password</label>
                            <input type="password" class="form-control" required name="txt_password" id="txt_password">
                        </div>
                        <div class="form-group">
                            <label for="file_photo">Photo</label>
                            <input type="file" class="form-control-file" name="file_photo" id="file_photo">
                        </div>
                        <div class="form-group">
                            <label for="file_proof">Proof</label>
                            <input type="file" class="form-control-file" name="file_proof" id="file_proof">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">Save</button>
                            <button type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="../Assets/JQ/jQuery.js"></script>
    <script>
                                            function getPlace(did)
                                            {

                                                $.ajax({url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                                                    success: function(result) {
                                                       
                                                        $("#selplace").html(result);
                                                    }});
                                            }

    </script>
<?php
include('Foot.php');
ob_flush();
?>
</html>