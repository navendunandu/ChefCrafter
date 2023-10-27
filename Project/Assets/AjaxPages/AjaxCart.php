<?php
session_start();
include("../Connection/Connection.php");
?>
<?php

    if ($_GET["action"]=="Delete") {
        $id = $_GET["id"];
        $delQry = "delete from tbl_foodcart where foodcart_id ='" .$id. "'";
        $conn->query($delQry);
    }
    if ($_GET["action"]=="Update") {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $upQry = "update tbl_foodcart set foodcart_qty = '" .$qty. "' where foodcart_id ='" .$id. "'";
        $conn->query($upQry);
    }
?>