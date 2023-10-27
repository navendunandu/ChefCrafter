<?php
include('../Assets/Connection/Connection.php');
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
<body>
<div class="container mt-4">
    <table class="table table-bordered">
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
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_chef c inner join tbl_place p on p.place_id=c.place_id inner join tbl_district d on d.district_id=p.district_id where chef_vstatus=2";
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
                    <td><a href="../Assets/File/Chef/Photo/<?php echo $data['chef_photo'] ?>" target="_blank">Photo</a></td>
                    <td><a href="../Assets/File/Chef/Photo/<?php echo $data['chef_proof'] ?>" target="_blank">Proof</a></td>
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