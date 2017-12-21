<?php
include_once 'connect.php';
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
	
	$catagory = $_POST['catagory'];
	$sub_catagory = $_POST['sub_catagory'];
	$product_name = $_POST['product_name'];
	$product_amount = $_POST['product_amount'];
	$product_quantity = $_POST['product_quantity'];
	$total_amount = $_POST['total_amount'];
	$product_type = $_POST['product_type'];
	$product_status = $_POST['product_status'];	
	$product_type_str = '';

	for($i=0; $i < count($product_type); $i++){
		$product_type_str .= $product_type[$i];
		if($i< (count($product_type)-1)){
			$product_type_str .= ",";
		}
	}

	$sql = "INSERT INTO e_kart 	(catagory, sub_catagory,
	product_name, product_amount, product_quantity, total_amount,
	product_type, product_status) VALUES ('$catagory', '$sub_catagory', '$product_name', '$product_amount', '$product_quantity', '$total_amount', '$product_type_str', '$product_status')";
	
if (mysqli_query($conn, $sql)) {

    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


}

?>
<html>
	<head>
		<title>vivel form</title>
		<link rel="stylesheet" href="css/style.css">
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="js/custom.js"></script>
	</head>

	<body>
		<form action="" method='post'>
			
			<div>
				<label for="catagory">Catagory</label>
				<select name="catagory" id="catagory">
					<option value="none">Select Catagory</option>
					<option value="clothes">Clothes</option>
					<option value="accessories">Accessories</option>
				</select>
			</div>

			<div>
				<label for="sub_catagory">Sub Catagory</label>
				<select name="sub_catagory" id="sub_catagory">
					<option value="none">None</option>
				</select>
			</div>

			<div>
				<label for="">Product Name</label>
				<input type="text" name="product_name">
			</div>
			<div>
				<label for="product_amount">Product Amount</label>
				<input type="number" id="product_amount" name="product_amount">
			</div>
			<div>
				<label for="product_quantity">Product Quantity</label>
				<input type="number" id="product_quantity" name="product_quantity">
			</div>
			<div>
				<label for="total_amount">Total Amount</label>
				<input type="number" id="total_amount" name="total_amount">
			</div>
			<div>
				<label for="">Product Type</label><br>
				<input type="checkbox" name="product_type[]" value="sale">Sale<br>
				<input type="checkbox" name="product_type[]" value="new">New<br>
				<input type="checkbox" name="product_type[]" value="old">Old<br>
				<input type="checkbox" name="product_type[]" value='other'>Other
			</div>
			<div>
				<label for="">Product Status</label>
				<input type="radio" value="Active" name='product_status' checked>
				<input type="radio" value="Deactive" name='product_status'>
			</div>
			<div><input type="submit" value="Submit"></div>
		</form>
	</body>
</html>