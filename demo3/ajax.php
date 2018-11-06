<?php
require_once '../config.php';

$data = array();
if (!empty($_GET['name'])) {
	$name = strtolower(trim($_GET['name']));
	$sql = "SELECT `country` from `tbl_country` WHERE LOWER(`country`) LIKE '".$name."%'";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		array_push($data, $row['country']);
	}
}
echo json_encode($data);
exit;