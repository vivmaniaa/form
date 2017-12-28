<?php
include_once "connect.php";

$sql = "SELECT * FROM e_kart";
$result = $conn->query($sql);
$products = "";
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$products .= "<tr>
				<td>{$row['product_name']}</td>
				<td>{$row['product_amount']}</td>
				<td>{$row['product_quantity']}</td>
				<td>{$row['total_amount']}</td>
				<td>{$row['product_type']}</td>
				<td>{$row['product_status']}</td>
				<td>
					<input data-id='{$row['id']}' class='edit_btn' type='button' value='Edit'>
					<input data-id='{$row['id']}' class='delete_btn' type='button' value='Delete'>
				</td>

			</tr>";
}

?>
<html>
<head>
	<title>Products</title>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
	<link rel="stylesheet" href="css/style.css">
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
</head>
<body>
	<!-- <div id="dialog_box" style="display: none;">Really delete?</div> -->
	<div class="container">
		<table>
			<tr>
				<th>Product Name</th>
				<th>Product Amount</th>
				<th>Product Quantity</th>
				<th>Total Amount</th>
				<th>Product Type</th>
				<th>Product Status</th>
				<th></th>
			</tr>
			<tr id="data_area">
				<?php echo $products; ?>
			</tr>
		</table>
		<a href="./"><input type="button" value="Add Products"></a>
	</div>
	
</body>
</html>