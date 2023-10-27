<?php
include("../Connection/Connection.php");
session_start();
$selqry="select * from tbl_booking where user_id='".$_SESSION["uid"]."' and chef_id='".$_GET['cid']."' and booking_status='0'";

$result=$conn->query($selqry);
if($result->num_rows>0)
{
	
	if($row=$result->fetch_assoc())
	{
		$bid = $row["booking_id"];
		
		
		
		$selqry="select * from tbl_foodcart where booking_id='".$bid."' and menu_id='".$_GET["id"]."'";
		//echo $selqry;
		$result=$conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to FoodCart";
			
		}
		else
		{
		
		 $insQry1="insert into tbl_foodcart(menu_id,booking_id)values('".$_GET["id"]."','".$bid."')";
         if($conn->query($insQry1))
          { 
             echo "Added to FoodCart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
		}
		
	}
	
}
else
{
	

$insQry=" insert into tbl_booking(user_id,booking_date,chef_id)values('".$_SESSION["uid"]."',curdate(),'".$_GET['cid']."')";
			if($conn->query($insQry))
			{
				$selqry1="select MAX(booking_id) as id from tbl_booking";
                $result=$conn->query($selqry1);
				if($row=$result->fetch_assoc())
				{
					$bid=$row["id"];
					
					
					$selqry="select * from tbl_foodcart where booking_id='".$bid."'and menu_id='".$_GET["id"]."'";
		$result=$conn->query($selqry);
		if($result->num_rows>0)
		{
			 echo "Already Added to FoodCart";
			
		}
		else
		{
					
					
	                   $insQry1="insert into tbl_foodcart(menu_id,booking_id)values('".$_GET["id"]."','".$bid."')";
                        if($conn->query($insQry1))
                        { 
                          echo "Added to FoodCart";
                        }
                        else
                        {
	                       echo"Failed";
                        }
					  
		}

                }
			}
}
?>