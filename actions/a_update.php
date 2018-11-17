<?php 

require "../includes/config.php";

if (isset($_POST["table"])) {
	$obj->connect();

	$table = $_POST["table"] ?? '';
	$id = $_POST["id"] ?? '';
	$name = mysqli_real_escape_string($obj->connection,$_POST["name"]);
	$adress = mysqli_real_escape_string($obj->connection,$_POST["adress"]);
	$zip = mysqli_real_escape_string($obj->connection,$_POST["zip"]);
	$city = mysqli_real_escape_string($obj->connection,$city);
	$country = mysqli_real_escape_string($obj->connection,$_POST["country"]);
	$image = mysqli_real_escape_string($obj->connection,$_POST["image"]);
	$type = mysqli_real_escape_string($obj->connection,$_POST["type"]);
	$short_desc = mysqli_real_escape_string($obj->connection,$_POST["short_desc"]);
	$web = mysqli_real_escape_string($obj->connection,$_POST["web"]) ?? '';
	
	if ($table == "poi") {
		$fields=array("name","adress","zip","city","country","image","type","short_desc","web");
		$values=array($name,$adress,$zip,$city,$country,$image,$type,$short_desc,$web);
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
 ?>