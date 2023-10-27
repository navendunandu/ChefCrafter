<?php
include('../Assets/Connection/Connection.php');
ob_start();
include('Head.php');
if(isset($_GET['id'])){
    $updQry="update tbl_chef set chef_vstatus='".$_GET['st']."' where chef_id=".$_GET['id'];
    if($conn->query($updQry)){
        ?>
        <script>
            alert('Updated')
            window.location='ChefList.php'
        </script>
        <?php
    }
    else{
        ?>
        <script>
            alert('Failed')
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table class="table table-bordered table-striped mt-4">
    <thead class="thead-dark">
        <tr>
            <th>Sl.No</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Address</th>
            <th>Location</th>
            <th>Photo</th>
            <th>Proof</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $selQry = "select * from tbl_chef c inner join tbl_place p on p.place_id=c.place_id inner join tbl_district d on d.district_id=p.district_id where chef_vstatus=1";
        $res = $conn->query($selQry);
        $i = 0;
        while ($data = $res->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['chef_name'] ?></td>
                <td><?php echo $data['chef_contact'] ?></td>
                <td><?php echo $data['chef_email'] ?></td>
                <td><?php echo $data['chef_address'] ?></td>
                <td><?php echo $data['place_name'] . ', ' . $data['district_name'] ?></td>
                <td><a href="../Assets/File/Chef/Photo/<?php echo $data['chef_photo'] ?>" target="_blank" class="btn btn-primary">View Photo</a></td>
                <td><a href="../Assets/File/Chef/Photo/<?php echo $data['chef_proof'] ?>" target="_blank" class="btn btn-primary">View Proof</a></td>
                <td><a href='NewChef.php?id=<?php echo $data['chef_id'] ?>&st=2' class="btn btn-danger">Reject</a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>