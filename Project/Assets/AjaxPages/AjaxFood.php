<option value="">Select Food</option>
<?php
include('../Connection/Connection.php');
$selQry="SELECT * from tbl_food where TRUE";
if($_GET['cid']!=""){
    $selQry.=" and category_id=".$_GET['cid'];
}
if($_GET['fid']!=""){
    $selQry.=" and foodtype_id=".$_GET['fid'];
}
$res=$conn->query($selQry);
while($data=$res->fetch_assoc()){
    ?>
    <option value="<?php echo $data['food_id'] ?>"><?php echo $data['food_name'] ?></option>
    <?php
}
?>