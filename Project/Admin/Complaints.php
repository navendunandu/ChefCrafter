<?php
include("../Assets/connection/connection.php");
ob_start();
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table class="table table-bordered table-striped mt-4">
    <thead class="thead-dark">
        <tr>
            <th>Sl.No</th>
            <th>Complaint Title</th>
            <th>Complaint Content</th>
            <th>User name</th>
            <th>Chef name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sel = "select * from tbl_complaint c inner join tbl_user u on u.user_id=c.user_id inner join tbl_chef cf on cf.chef_id=c.chef_id";
        $row = $conn->query($sel);
        $i = 0;
        while ($data = $row->fetch_assoc()) {
            $i++;
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $data['complaint_title'] ?></td>
                <td><?php echo $data['complaint_content'] ?></td>
                <td><?php echo $data['user_name'] ?></td>
                <td><?php echo $data['chef_name'] ?></td>
                <td>
                    <?php
                    if ($data['complaint_reply'] == "") {
                        ?>
                        <a href="Reply.php?cid=<?php echo $data['complaint_id'] ?>" class="btn btn-primary">Reply</a>
                        <?php
                    } else {
                        echo $data['complaint_reply'];
                    }
                    ?>
                </td>
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