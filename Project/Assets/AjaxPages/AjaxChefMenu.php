<?php
include("../Connection/Connection.php");

    if (isset($_GET["action"])) {

        $sqlQry = "SELECT * from tbl_menu m inner join tbl_food f on f.food_id=m.food_id inner join tbl_category c on c.category_id=f.category_id  inner join tbl_foodtype ft on f.foodtype_id=ft.foodtype_id where m.chef_id=".$_GET['cid'];
       
        if ($_GET["category"]!=null) {

            $category = $_GET["category"];

            $sqlQry = $sqlQry." AND c.category_id IN(".$category.")";
        }
        if ($_GET["foodtype"]!=null) {

            $foodtype = $_GET["foodtype"];

            $sqlQry = $sqlQry." AND ft.foodtype_id IN(".$foodtype.")";
        }
		
		if ($_GET["name"]!=null) {

            $name = $_GET["name"];

            $sqlQry = $sqlQry." AND food_name LIKE '".$name."%'";
        }
        $resultS = $conn->query($sqlQry);
        
       

        if ($resultS->num_rows > 0) {
            while ($rowS = $resultS->fetch_assoc()) {
?>

<div class="col-md-3 mb-2">
                            <div class="card-deck">
                                <div class="card border-secondary">
                                    <img src="../Assets/File/Chef/Menu/<?php echo $rowS["menu_photo"]; ?>" class="card-img-top" height="250">
                                    <div class="card-img-secondary">
                                        <h6  class="text-light bg-info text-center rounded p-1"><?php echo $rowS["food_name"]; ?></h6>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-danger" align="center">
                                            Price/Plate : <?php echo $rowS["menu_rate"]; ?>/-
                                        </h4>
                                        <p align="center">
                                            <?php echo $rowS["category_name"]; ?><br>
                                            <?php echo $rowS["foodtype_name"]; ?><br>
                                        </p>
                                        <a href="javascript:void(0)" onclick="addCart(<?php echo $rowS['menu_id']; ?>)" class="btn btn-success btn-block">Add to Cart</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

<?php
            }
        } else {
             echo "<h4 align='center'>Products Not Found!!!!</h4>";
        }
    }

?>