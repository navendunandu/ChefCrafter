

<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_POST['btn_save']))
{
	$place=$_POST['txtplace'];
	$district=$_POST['selDistrict'];
	$insQry="insert into tbl_place(place_name,district_id) values('$place','$district')";
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
	$delQry="delete from tbl_place where place_id=".$_GET['did'];
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
<title>Place</title>
</head>

<body>
<div class="container mt-4">
    <form id="form1" name="form1" method="post" action="">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Place Entry</h5>
                        <div class="form-group">
                            <label for="selDistrict">District Name</label>
                            <select class="form-control" name="selDistrict" id="selDistrict">
                                <?php
                                $selQry = 'select * from tbl_district';
                                $result = $conn->query($selQry);
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row['district_id']?>"><?php echo $row['district_name']?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="txtplace">Place Name</label>
                            <input type="text" class="form-control" name="txtplace" id="txtplace" />
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btn_save" id="btn_save">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-bordered mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Sl.no</th>
                <th>Place</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
            $result = $conn->query($selQry);
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['place_name'] ?></td>
                    <td><?php echo $row['district_name'] ?></td>
                    <td><a href="Place.php?did=<?php echo $row['place_id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>



</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>