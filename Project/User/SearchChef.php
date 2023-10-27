<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload='getChef()'>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <label for="selDistrict">District</label>
                            <select class="form-control" name="selDistrict" id="selDistrict" onchange='getPlace(this.value),getChef()'>
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
            <div class="col-lg-4">
            <label for="selplace">Place</label>
                            <select class="form-control" name="selplace" id="selplace" onchange='getChef()'>
                                <option value="">---Select---</option>
                            </select>
            </div>
        </div>
    </div>
    <div class="container"><div class="row" id="result" style="gap:2rem;"></div></div>
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
    function getChef(){
        dist=document.getElementById('selDistrict').value;
        place=document.getElementById('selplace').value;
        $.ajax({url: "../Assets/AjaxPages/AjaxChef.php?did=" + dist+"&pid="+place,
            success: function(search) { 
                $("#result").html(search);
            }});
    }
</script>
<?php
include('Foot.php');
ob_flush();
?>
</html>