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
	$place=$_POST['selplace'];
	$Password=$_POST['txt_password'];
  $Photo=$_FILES['file_photo']["name"];
	$path=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($path,"../Assets/File/User/".$Photo);

	$insQry="insert into tbl_user(user_name,user_contact,user_email,user_address,user_password,place_id,user_photo)values('$Name','$Contact','$Email','$Address','$Password','$place','$Photo')";
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
<div class="row justify-content-center" style="padding-bottom:5rem;">
        <div class="col-md-4">
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Sign Up</h3>
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
                            <input type="text" class="form-control" required name="txt_address" id="txt_address">
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
                            <label for="file_photo">Photo</label>
                            <input type="file" class="form-control-file" name="file_photo" id="file_photo">
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password</label>
                            <input type="password" class="form-control" required name="txt_password" id="txt_password">
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
                </body>
          
<?php
include('Foot.php');
ob_flush();
?>      
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
    </html>

