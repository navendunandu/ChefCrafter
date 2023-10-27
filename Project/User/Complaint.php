<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST["btnsubmit"]))
{
		$content=$_POST["txtcontent"];
		$complainttypeid=$_POST["txttype"];
		$insQry="insert into tbl_complaint(complaint_date,complaint_content,user_id,complaint_title,chef_id)values(curdate(),'".$content."','".$_SESSION["uid"]."','".$_POST["txt_title"]."','".$_GET['cid']."')";
		echo $insQry;
			if($conn->query($insQry))
			{	?>
            	<script>
				alert('Inserted');
				location.href='Complaint.php';
				</script>
              <?php
				
			}
			else
			{   
			?>
            	<script>
				alert('Failed');
				location.href='Complaint.php';
				</script>
                <?Php
             }
}
?>
<div class="container mt-5">
        <h1 class="text-center">Complaint</h1>
        <form id="form1" name="form1" method="post" action="">
            <div class="form-group">
                <label for="txt_title">Title</label>
                <input type="text" class="form-control" name="txt_title" id="txt_title">
            </div>
            <div class="form-group">
                <label for="txtcontent">Content</label>
                <textarea class="form-control" name="txtcontent" id="txtcontent" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>