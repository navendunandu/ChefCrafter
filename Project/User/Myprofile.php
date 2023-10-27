<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
$selUserQuery = "select * from tbl_user u inner join tbl_place p on p.place_id = u.place_id inner join tbl_district d on d.district_id = p.district_id where user_id='".$_SESSION["uid"]."'";
$userData = $conn->query($selUserQuery);
$userRow = $userData->fetch_assoc();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="container">
  <table class="table table-bordered">
    <tr>
      <td>Image:</td>
      <td>
        <img src="../Assets/File/User/<?php echo $userRow["user_photo"] ?>" class="img-fluid" alt="User Photo" id="user-photo" />
      </td>
    </tr>
    <tr>
      <td>Name:</td>
      <td>
        <?php echo $userRow["user_name"] ?>
      </td>
    </tr>
    <tr>
      <td>Contact:</td>
      <td>
        <?php echo $userRow["user_contact"] ?>
      </td>
    </tr>
    <tr>
      <td>Email:</td>
      <td>
        <?php echo $userRow["user_email"] ?>
      </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td>
        <?php echo $userRow["user_address"] ?>
      </td>
    </tr>
    <tr>
      <td>District</td>
      <td>
        <?php echo $userRow["district_name"] ?>
      </td>
    </tr>
    <tr>
      <td>Place</td>
      <td>
        <?php echo $userRow["place_name"] ?>
      </td>
    </tr>
  </table>
</div>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>
