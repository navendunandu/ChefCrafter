<?php
include("../Assets/Connection/connection.php");
ob_start();
include('Head.php');
$selQry="SELECT * from tbl_chef c inner join tbl_place p on p.place_id=c.place_id inner join tbl_district d on d.district_id=p.district_id where c.chef_id=".$_GET['cid'];
$res=$conn->query($selQry);
$data=$res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>
</head>
<body onload='productCheck()'>
<input type="hidden" name="txtid" id='txtid' value=<?php echo $_GET['cid'] ?>>
<div class="container">
        <div class="card mt-4" style="height:250px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../Assets/File/Chef/Photo/<?php echo $data['chef_photo'] ?>" class="card-img" alt="Chef's Photo" style="height:250px;object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data['chef_name'] ?></h5>
                        <p class="card-text">
                            <strong>Contact:</strong><?php echo $data['chef_contact'] ?><br>
                            <strong>Email:</strong><?php echo $data['chef_email'] ?><br>
                            <strong>Address:</strong><?php echo $data['chef_address'] ?><br>
                            <strong>Location:</strong><?php echo $data['place_name'].', '.$data['district_name'] ?><br>
                            <strong>Rating:</strong> 4.5/5
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <h5>Filter Product</h5>
                    <hr>
                    <h6 class="text-info"> Name</h6>
                    <ul class="list-group">
                       
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="text" onkeyup="productCheck()" class="product_check" id="txt_name">
                                </label>
                            </div>
                        </li>
                    </ul>
                    <br />
                    <h6 class="text-info"> Select Category</h6>
                    <ul class="list-group">
                        <?php                           
						 $selCat = "SELECT * from tbl_category";
                            $result = $conn->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                    <br />
                    <h6 class="text-info">Food Type</h6>
                    <ul class="list-group" id="subcat">
                    <?php                           
						 $selCat = "SELECT * from tbl_foodtype";
                            $result = $conn->query($selCat);
                            while ($row=$result->fetch_assoc()) {
                        ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="productCheck()" class="form-check-input product_check" value="<?php echo $row["foodtype_id"]; ?>" id="foodtype"><?php echo $row["foodtype_name"]; ?>
                                </label>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <h5 class="text-center" id="textChange">All Products</h5>
                    <hr>
                    <div class="text-center">
                        <img src="../Assets/Template/Search/loader.gif" id='loder' width="200" style="display: none"/>
                    </div>
                    <div class="row" id="result">
                    </div>

                </div>

            </div>
                        </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
    var chef=document.getElementById('txtid').value;
    function addCart(id)
            {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddCart.php?id=" + id+"&cid="+chef,
                    success: function(response) {
                        if (response.trim() === "Added to FoodCart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to FoodCart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }


            function productCheck(){
                    $("#loder").show();

                    var action = 'data';
                    var category = get_filter_text('category');
                    var foodtype = get_filter_text('foodtype');
					var name = document.getElementById('txt_name').value;
					


                    $.ajax({
                        url: "../Assets/AjaxPages/AjaxChefMenu.php?action=" + action +"&category=" + category+"&foodtype=" + foodtype+"&name=" + name+"&cid="+chef ,
                        success: function(response) {
                            $("#result").html(response);
                            $("#loder").hide();
                            $("#textChange").text("Filtered Products");
                        }
                    });


                }



                function get_filter_text(text_id)
                {
                    var filterData = [];

                    $('#' + text_id + ':checked').each(function() {
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            
</script>
<?php
include('Foot.php');
ob_flush();
?>
</html>