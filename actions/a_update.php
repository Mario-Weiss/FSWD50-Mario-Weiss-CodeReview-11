<?php 
session_start();
if (isset($_SESSION['admin'])) {
	require "../includes/config.php";

	if (isset($_POST["table"])) {
		$obj->connect();

		$table = $_POST["table"] ?? '';
		$id = $_POST["id"] ?? '';
		$name = mysqli_real_escape_string($obj->connection,$_POST["name"]);
		$adress = mysqli_real_escape_string($obj->connection,$_POST["adress"]);
		$zip = mysqli_real_escape_string($obj->connection,$_POST["zip"]);
		$city = mysqli_real_escape_string($obj->connection,$_POST["city"]);
		$country = mysqli_real_escape_string($obj->connection,$_POST["country"]);
		$image = mysqli_real_escape_string($obj->connection,$_POST["image"]);
		$type = mysqli_real_escape_string($obj->connection,$_POST["type"]);
		$short_desc = mysqli_real_escape_string($obj->connection,$_POST["short_desc"]);
		$web = mysqli_real_escape_string($obj->connection,$_POST["web"]) ?? '';
		$datetime = mysqli_real_escape_string($obj->connection,$_POST["datetime"]) ?? '';
		$price = mysqli_real_escape_string($obj->connection,$_POST["price"]) ?? '';
		$phone = mysqli_real_escape_string($obj->connection,$_POST["phone"]) ?? '';

		if ($table == "poi") {
			$fields=array("name","adress","zip","city","country","image","type","short_desc","web");
			$values=array($name,$adress,$zip,$city,$country,$image,$type,$short_desc,$web);
		} elseif ($table == "restaurant") {
			$fields=array("name","adress","zip","city","country","image","type","short_desc","web","phone");
			$values=array($name,$adress,$zip,$city,$country,$image,$type,$short_desc,$web,$phone);
		} elseif ($table == "event") {
			$fields=array("name","adress","zip","city","country","image","type","short_desc","web","datetime","price");
			$values=array($name,$adress,$zip,$city,$country,$image,$type,$short_desc,$web,$datetime,$price);
		}

		if ($id != ''){
			$condition["id"] = $id;
			$set = [];
			foreach ($fields as $key => $value) {
				$set[$value] = $values[$key];
			}
			$obj->update($table,$set,$condition);
		}
	}
}
 ?>