<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
$currentDate = date('Y-m-d');
if(isset($_GET['bid'])){
    $updQry="update tbl_booking set booking_status=3 where booking_id=".$_GET['bid'];
    if($conn->query($updQry)){
        ?>
        <script>
            alert('Updated')
            window.location='MyOrder.php'
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
                <th>Chef</th>
                <th>Contact</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selQry = "select * from tbl_booking b inner join tbl_chef c on c.chef_id=b.chef_id where b.booking_status > 0 and b.user_id=" . $_SESSION['uid'];
            $res = $conn->query($selQry);
            $i = 0;
            while ($data = $res->fetch_assoc()) {
                $i++;
                ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $data['booking_fordate'] ?></td>
                    <td><?php echo $data['chef_name'] ?></td>
                    <td><?php echo $data['chef_contact'] ?></td>
                    <td><?php echo $data['booking_amount'] ?></td>
                    <td><?php 
                    if($data['booking_status']==1){
                        echo "Waiting for Confirmation";
                    }
                    else if($data['booking_status']==2){
                        echo "Request Approved.<br>Finish Payment to Continue";
                    }
                    else if($data['booking_status']==3){
                        echo "Chef Declined the request.";
                    }
                    else if($data['booking_status']==4){
                        echo "Cancelled";
                    }
                    else if($data['booking_status']==5){
                        echo "Chef Booked";
                    }
                    ?></td>
                    <td><?php
                    if($data['booking_status']!=4 && $data['booking_status']!=3){
                        ?>
                        <a class='btn btn-primary btn-sm' href='Rating.php?pid=<?php echo $data['chef_id'] ?>'>Rating</a><br><br>
                        <a class='btn btn-primary btn-sm' href='Complaint.php?cid=<?php echo $data['chef_id'] ?>'>Post Complaint</a><br><br>
                        <?php
                    }
                    if($data['booking_status']!=3 && $data['booking_status']!=4 && $data['booking_fordate']>$currentDate){
                        ?>
                        <a class='btn btn-primary btn-sm' href='MyOrder.php?bid=<?php echo $data['booking_id'] ?>'>Cancel</a><br><br>
                        <?php
                    }
                    if($data['booking_status']==2 ){
                        ?>
                        <a class='btn btn-primary btn-sm' href='Payment.php?bid=<?php echo $data['booking_id'] ?>'>Payment</a>
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