<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
	include_once 'connect.php';
	$id = trim($_GET['id']);
	$sql = "SELECT * FROM e_kart WHERE id = '$id'";	
	$result = $conn->query($sql);
	if(!mysqli_num_rows($result) > 0){
		header('Location: ./');
	}else{
		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST) && !empty($_POST)){
	
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

			$sql = "UPDATE e_kart SET catagory='$catagory', sub_catagory = '$sub_catagory', product_name = '$product_name',
			product_amount='$product_amount', product_quantity='$product_quantity', total_amount='$total_amount', product_type='$product_type_str',
			product_status='$product_status' WHERE id='$id'";
			
			if (mysqli_query($conn, $sql)) {

			    header("Location: products.php");
			} else {
			    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}

	}
}else{
	header("Location: ./");
}





?>

<html>
	<head>
		<title>Edit Page Product</title>
		<!-- css -->	
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/blitzer/jquery-ui.css">
		<link rel="stylesheet" href="css/style.css">

		<!-- script -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
		<script src="js/custom.js"></script>
	</head>

	<body>
		<?php 
			while($row = $result->fetch_array(MYSQLI_BOTH)){

		?>
		
		<form action="" method='post'>
			<div>
				<label for="catagory">Catagory</label>
				<select name="catagory" id="catagory">
					<option value="<?php echo $row['catagory'];?>"><?php echo $row['catagory'];?></option>
					<option value="clothes">Clothes</option>
					<option value="accessories">Accessories</option>
				</select>
			</div>

			<div>
				<label for="sub_catagory">Sub Catagory</label>
				<select name="sub_catagory" id="sub_catagory">
					<option value="<?php echo $row['sub_catagory']; ?>"><?php echo $row['sub_catagory'];?></option>
				</select>
			</div>

			<div>
				<label for="">Product Name</label>
				<input type="text" name="product_name" value="<?php echo $row['product_name'];?>">
			</div>
			<div>
				<label for="product_amount">Product Amount</label>
				<input type="number" id="product_amount" name="product_amount" value="<?php echo $row['product_amount'];?>">
			</div>
			<div>
				<label for="product_quantity">Product Quantity</label>
				<input type="number" id="product_quantity" name="product_quantity" value="<?php echo $row['product_quantity'];?>">
			</div>
			<div>
				<label for="total_amount">Total Amount</label>
				<input type="number" id="total_amount" name="total_amount" value="<?php echo $row['total_amount'];?>">
			</div>
			<div>
				<label for="">Product Type</label><br>
				<?php $row['product_type'] = explode(',', $row['product_type']);?>
				<input type="checkbox" name="product_type[]" value="sale" <?php echo (in_array("sale", $row['product_type'])? 'checked': false)?>>Sale<br>
				<input type="checkbox" name="product_type[]" value="new" <?php echo (in_array("new", $row['product_type'])? 'checked': false)?> >New<br>
				<input type="checkbox" name="product_type[]" value="old" <?php echo (in_array("old", $row['product_type'])? 'checked': false)?> >Old<br>
				<input type="checkbox" name="product_type[]" value='other' <?php echo (in_array("other", $row['product_type'])? 'checked': false)?> >Other
			</div>
			<div>
				<label for="">Product Status</label>
				<input type="radio" value="Active" name='product_status' <?php echo ($row['product_status']=='Active' ? 'checked': false)?>>
				<input type="radio" value="Deactive" name='product_status' <?php echo ($row['product_status']=='Deactive' ? 'checked': false)?> >
			</div>
			<div><input type="submit" value="Submit"> <input type="button" id="show_all" value="Show all items"></div>
			<div></div>
		</form>
		<?php	}
		?>
	</body>
</html>