<?php 
	include_once 'connect.php';
	$catagory = 'clothes';

	$sql = "SELECT sub_catagory FROM catagories WHERE catagory = '$catagory'";

	$result = $conn->query($sql);
	$data = [];
	while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
		$data[] = $row[0];
	}	
	$options = '';
	foreach ($data as $item){
		$options .= "<option value='$item'>$item</option>";
	}
	echo $options;