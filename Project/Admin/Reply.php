<?php
include("../Assets/connection/connection.php");
ob_start();
include('Head.php');
if(isset($_POST['btnsubmit'])){
    $udQry="update tbl_complaint set complaint_reply='".$_POST['txtreply']."' where complaint_id=".$_GET['cid'];
    if($conn->query($udQry)){
        ?>
        <script>
            alert('Replied')
            window.location='Complaints.php'
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
<div class="container mt-4">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-dark">
                    <div class="card-body">
                        <h5 class="card-title">Reply Form</h5>
                        <div class="form-group">
                            <label for="txtreply">Reply</label>
                            <textarea class="form-control" name="txtreply" id="txtreply" cols="30" rows="10"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>