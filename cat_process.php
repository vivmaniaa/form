<?php


include_once "connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
	$catagory = $_POST['catagory'];

	$sql = "SELECT sub_catagory FROM catagories WHERE catagory = '$catagory'";

	$result = $conn->query($sql);
	$data = array();
	while($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
		$data[] = $row[0];
	}	
	/*$options = '';
	foreach ($data as $item){
		$options .= "<option value='$item'>$item</option>";
	}*/

	echo json_encode($data);
}
