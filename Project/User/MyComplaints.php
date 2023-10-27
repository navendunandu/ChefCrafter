<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
?>
<div class='container'>
    <h1 class="text-center p-3">My Complaint</h1>
    <?php
    $selQry = "select * from tbl_complaint where user_id='" . $_SESSION["uid"] . "'";
    $rel = $conn->query($selQry);
    if ($rel->num_rows > 0) {
    ?>
    <table class="table table-bordered table-striped mx-auto">
      <thead>
        <tr>
          <th>Sl.No</th>
          <th>Title</th>
          <th>Date</th>
          <th>Content</th>
          <th>Reply</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;

        while ($row = $rel->fetch_assoc()) {
          $i++;
        ?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $row["complaint_title"] ?></td>
          <td><?php echo $row["complaint_date"] ?></td>
          <td><?php echo $row["complaint_content"] ?></td>
          <td><?php echo $row["complaint_reply"] ?></td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php
    } else {
      echo "<h1 class='text-center'>No Data Found</h1>";
    }
    ?>
  </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>