<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
if(isset($_GET['bid'])){
    $updQry="update tbl_booking set booking_status=".$_GET['st']." where booking_id=".$_GET['bid'];
    if($conn->query($updQry)){
        ?>
        <script>
            alert('Updated')
            window.location='Orders.php'
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
    <div class="container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Date</th>
                <th>User</th>
                <th>Contact</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_booking b inner join tbl_user u on u.user_id=b.user_id where b.booking_status > 0 and chef_id=" . $_SESSION['cid'];
            $res = $conn->query($selQry);
            $i = 0;
            while ($data = $res->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['booking_fordate'] ?></td>
                    <td><?php echo $data['user_name'] ?></td>
                    <td><?php echo $data['user_contact'] ?></td>
                    <td><?php echo $data['booking_amount'] ?></td>
                    <td><?php 
                    if($data['booking_status']==1){
                        echo "Confirm Your Order";
                    }
                    else if($data['booking_status']==2){
                        echo "Request Approved.<br>Waiting for Payment";
                    }
                    else if($data['booking_status']==3){
                        echo "Request Declined.";
                    }
                    else if($data['booking_status']==4){
                        echo "Cancelled by User";
                    }
                    else if($data['booking_status']==5){
                        echo "Booking Completed";
                    }
                    ?></td>
                    <td><?php
                    if($data['booking_status']==1 ){
                        ?>
                        <a class='btn btn-primary btn-sm' href='Orders.php?st=2&bid=<?php echo $data['booking_id'] ?>'>Accept</a>&nbsp;
                        <a class='btn btn-primary btn-sm' href='Orders.php?st&3&bid=<?php echo $data['booking_id'] ?>'>Accept</a>
                        <?php
                    }
                    ?>
                     </td>
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