<?php
include 'include/db.php';

//execute for display datalist for customer name
if(isset($_POST['customer_name']))
{
	$customer_name = $_POST['customer_name'];
	$sql = "SELECT * FROM customer WHERE name like '{$customer_name}%' AND status = '1'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) != 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo "<option value='{$row['name']}'>";
		}
	}
}


//execute for display datalist for customer mobile
if(isset($_POST['customer_mobile']))
{
	$customer_mobile = $_POST['customer_mobile'];
	$sql = "SELECT * FROM customer WHERE phone_no like '{$customer_mobile}%' AND status = '1'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query) != 0)
	{
		while($row = mysql_fetch_array($query))
		{
			echo "<option value='{$row['phone_no']}'>";
		}
	}
}

//execute for display datalist for customer mobile
if(isset($_POST['customermobile']))
{
	$customer_mobile = $_POST['customermobile'];
	$sql = "SELECT * FROM customer WHERE phone_no = '{$customer_mobile}' AND status = '1'";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	$name = $row['name'];
	$email = $row['email'];
	$address = $row['address'];
	if(mysql_num_rows($query) != 0)
	{		
		echo json_encode(array($name,$email,$address));
	}
	else
	{
		echo "fail";
	}
}

if(isset($_POST['product_id']))
{
	$product_id = $_POST['product_id'];

	$sql = "SELECT * FROM product WHERE product_id = '{$product_id}' AND qty > '0' AND status = '1'";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
	if(mysql_num_rows($query) != 0)
	{
		$product_array = array($row['product_name'] , $row['category'] , 
			$row['brand'] , $row['color'] , $row['size'] , $row['type'] , $row['price']);
		echo json_encode($product_array);
	}
	else{
		echo "fail";
	}
}


//insert into database when new bill is created..	
if(isset($_POST['customer_details']))
{
	$customer_details = $_POST['customer_details'];
	$product_name_array = $_POST['bill_product_name'];
	$brand_array = $_POST['bill_brand'];
	$size_array = $_POST['bill_size'];
	$type_array = $_POST['bill_type'];
	$price_array = $_POST['bill_price'];
	$quantity_array = $_POST['bill_quantity'];
	$discount_item_array = $_POST['bill_discount_item'];
	$discount_amount_array = $_POST['bill_discount_amount'];
	$amount_array = $_POST['bill_amount'];
	$payment_detail = $_POST['payment_detail'];

	//for loop for insert product into finance table
	for($i=0; $i < count($product_name_array); $i++ )
	{
		$pro_name = $product_name_array[$i];
		$pro_qty = $quantity_array[$i];
		$pro_price = $price_array[$i];

		$sql_finance = "INSERT INTO finance (product_name,qty,price,purchase_date) VALUES 
		('$pro_name','$pro_qty','$pro_price',NOW())";

		$query_finance = mysql_query($sql_finance);
	}
	echo "success";


	$product_name = implode("/", $product_name_array);
	$brand = implode("/", $brand_array);
	$size = implode("/", $size_array);
	$type = implode("/", $type_array);
	$quantity = implode("/", $quantity_array);
	$price = implode("/", $price_array);
	$discount_item = implode("/", $discount_item_array);
	$discount_amount = implode("/", $discount_amount_array);
	$amount = implode("/", $amount_array);


	// //assing payment details..
	// $total_item = $payment_detail['0'];
	// $sub_total = $payment_detail['1'];
	// $main_discount = $payment_detail['2'];
	// $grand_total = $payment_detail['3'];
	// $pay = $payment_detail['4'];
	// $due = $payment_detail['5'];
	// $final_due = $due;

	// //assign customer information..
	// $customer_name = ucwords($customer_details['0']);
	// $customer_mobile = $customer_details['1'];
	// $customer_email = $customer_details['2'];
	// $customer_address = $customer_details['3'];


	// //create new bill number..
	// //fetch last id from bill
	// $query = mysql_query("SELECT id FROM bill order by id DESC LIMIT 1 ");
	// $row = mysql_fetch_array($query);
	// //check if there is no row in bill table
	// if(mysql_num_rows($query) > 0)
	// {
	// 	$new_bill_number = $row['id'] + 1;
	// 	$bill_number = "AWC_".$new_bill_number;
	// }
	// else{
	// 	$bill_number = "AWC_1";
	// }
	


	// //check if customer all fields are filled..!!
	// if($customer_name != "" && $customer_mobile == "" && $customer_email == "" && $customer_address == "")
	// {
	// 	$sql = "INSERT INTO customer (name,phone_no,email,address,bill_no,due,total_due,created_date) VALUES ('$customer_name','$customer_mobile','$customer_email','$customer_address','$bill_number','$due','$due',NOW() )";
	// 	$query = mysql_query($sql);

	// 	$sql = "SELECT id FROM customer order by id DESC LIMIT 1";
	// 	$query = mysql_query($sql);
	// 	$row = mysql_fetch_array($query);
	// 	$customer_id = $row['id'];
	// }
	// //execute if there is any field is filled from customer_mobile, customer_email or customer_address..
	// elseif(($customer_mobile != "" || $customer_email != "" || $customer_address != "") )
	// {
	// 		if(empty($customer_name))
	// 		$customer_name_for_query = "%";
	// 		else
	// 		$customer_name_for_query = $customer_name;

	// 		if(empty($customer_mobile))
	// 		$customer_mobile_for_query = "%";
	// 		else
	// 		$customer_mobile_for_query = $customer_mobile;

	// 		if(empty($customer_email))
	// 		$customer_email_for_query = "%";
	// 		else
	// 		$customer_email_for_query = $customer_email;

	// 		if(empty($customer_address))
	// 		$customer_address_for_query = "%";
	// 		else
	// 		$customer_address_for_query = $customer_address;

	// 		if(!empty($customer_mobile))
	// 		{
	// 			$sql = "SELECT * FROM customer WHERE name LIKE '$customer_name_for_query' AND phone_no LIKE '$customer_mobile_for_query' AND Status = 1";
	// 			$query = mysql_query($sql);
	// 			$row = mysql_fetch_array($query);
	// 			$customer_id = $row['id'];
	// 		}
	// 		else{
	// 			$sql = "SELECT * FROM customer WHERE name LIKE '$customer_name_for_query'  AND email LIKE '$customer_email_for_query' AND address LIKE '$customer_address_for_query') AND Status = 1";
	// 			$query = mysql_query($sql);	
	// 			$max_match = array();
			
	// 			while($row = mysql_fetch_array($query))
	// 			{
	// 				$count = 0;
	// 				if($row['name'] != "")
	// 					$count = $count + 1;
	// 				if($row['phone_no'] != "")
	// 					$count = $count + 1;
	// 				if($row['email'] != "" )
	// 					$count = $count + 1;
	// 				if($row['address'] != "")
	// 					$count = $count + 1;

	// 				$key = $row['id'];
	// 				$max_match[$key] = $count;
	// 			}
	// 			if(count($max_match) != 0)
	// 			{
	// 				$max_value = max($max_match);
	// 				$max_key = array_search($max_value, $max_match);
	// 			}
	// 			$customer_id =$max_key;
	// 		}

			
			
	// 		// echo mysql_num_rows($query);
	// 		if(mysql_num_rows($query) > 0)
	// 		{
				
				
	// 			$query = mysql_query("SELECT * FROM customer WHERE id = $customer_id");
	// 			$row = mysql_fetch_array($query);
	// 			$old_bill_no = $row['bill_no'];
	// 			$old_due = $row['due'];
				

	// 			if($old_bill_no == "")
	// 			$bill_no = $bill_number;
	// 			else
	// 			$bill_no = $old_bill_no . "/" . $bill_number;

	// 			//check if old due is blank
	// 			if($old_due == "")
	// 			{
	// 				$total_due = 0;
	// 				$customer_due = $due;
	// 			}
	// 			else
	// 			{
	// 				$customer_due = $old_due . "/" .$due;
	// 				$total_due = 0;
	// 				$due = explode("/", $customer_due);
	// 				foreach($due as $dues){
	// 					$total_due += $dues;
	// 				}
	// 			}
	// 			$total_due = number_format($total_due, 2, '.', '');
	// 			$sql = "UPDATE customer SET name = '$customer_name' , phone_no = '$customer_mobile' , email = '$customer_email' , address = '$customer_address' , bill_no = '$bill_no' , due = '$customer_due' , total_due = '$total_due' WHERE id = $customer_id ";
	// 			$query = mysql_query($sql);
	// 		}
	// 		else
	// 		{
	// 			$sql = "INSERT INTO customer (name,phone_no,email,address,bill_no,due,total_due,created_date) VALUES ('$customer_name','$customer_mobile','$customer_email','$customer_address','$bill_number','$due','$due',NOW() )";
	// 			$query = mysql_query($sql);

	// 			$sql = "SELECT id FROM customer order by id DESC LIMIT 1";
	// 			$query = mysql_query($sql);
	// 			$row = mysql_fetch_array($query);
	// 			$customer_id = $row['id'];
	// 		}
	// }
	// else
	// {
	// 	$sql = "SELECT * FROM customer WHERE id = 1";
	// 	$query = mysql_query($sql);
	// 	$row = mysql_fetch_array($query);
	// 	$customer_id = $row['id'];
	// 	$old_bill_no = $row['bill_no'];
	// 	$old_due = $row['due'];

	// 	if($old_bill_no == "")
	// 	$bill_no = $bill_number;
	// 	else
	// 	$bill_no = $old_bill_no . "/" . $bill_number;

	// 	//check if old due is blank
	// 	if($old_due == "")
	// 	{
	// 		$total_due = 0;
	// 		$customer_due = $due;
	// 	}
	// 	else
	// 	{
	// 		$customer_due = $old_due . "/" .$due;
	// 		$total_due = 0;
	// 		$due = explode("/", $customer_due);
	// 		foreach($due as $dues){
	// 			$total_due += $dues;
	// 		}
	// 	}
	// 	$total_due = number_format($total_due, 2, '.', '');
	// 	$sql = "UPDATE customer SET bill_no = '$bill_no' , due = '$customer_due' , total_due = '$total_due' WHERE id = 1 ";
	// 	$query = mysql_query($sql);
	// }



	

	// $sql = "INSERT INTO bill (bill_number,customer_id,product_id,quantity,product_price,discount_per_item,discount_amount_per_item,amount_per_item,total_item,sub_total,main_discount,grand_total,pay,due,created_date) VALUES ('$bill_number','$customer_id','$product_id','$quantity_per_item' , '$price_per_item' , '$discount_per_item' , '$discount_amount' , '$amount_per_item' , '$total_item', '$sub_total' , '$main_discount','$grand_total','$pay','$final_due',NOW())";
	// $query = mysql_query($sql);


	
}

?>