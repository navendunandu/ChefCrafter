<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');

$selchefQuery = "select * from tbl_chef u inner join tbl_place p on p.place_id = u.place_id inner join tbl_district d on d.district_id = p.district_id where chef_id='".$_SESSION["cid"]."'";
$chefData = $conn->query($selchefQuery);
$chefRow = $chefData->fetch_assoc();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="../Assets/File/chef/<?php echo $chefRow["chef_photo"] ?>" class="card-img-top" alt="Chef Photo">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $chefRow["chef_name"] ?></h5>
                    <p class="card-text">Contact: <?php echo $chefRow["chef_contact"] ?></p>
                    <p class="card-text">Email: <?php echo $chefRow["chef_email"] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr>
                    <td>Name:</td>
                    <td><?php echo $chefRow["chef_name"] ?></td>
                </tr>
                <tr>
                    <td>Contact:</td>
                    <td><?php echo $chefRow["chef_contact"] ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $chefRow["chef_email"] ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $chefRow["chef_address"] ?></td>
                </tr>
                <tr>
                    <td>District:</td>
                    <td><?php echo $chefRow["district_name"] ?></td>
                </tr>
                <tr>
                    <td>Place:</td>
                    <td><?php echo $chefRow["place_name"] ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>



<?php
ob_flush();
include("Foot.php");

?>