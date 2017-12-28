<?php


include_once "connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST)){
	$id = $_POST['id'];

	$sql = "DELETE FROM e_kart WHERE id = '$id'";

	if($conn->query($sql)){
		$data = true;
	}else{
		$data = false;
	}

	mysql_close($conn);
	echo $data;
}
