<?php 
session_start();
require "../includes/config.php";

if (isset($_POST["render"])) {
	$table = $_POST['table'] ?? '';
	$fields = $_POST['fields'] ?? '*, "'.$table.'" as "table"';
	$join = $_POST['join'] ?? '';
	$where = $_POST['where'] ?? '';
	$orderby = $_POST['orderby'] ?? '';

	$rows = $obj->read($table, $fields, $join,$where,$orderby);
	$result = '';
	foreach ($rows as $row) {
		$result .= '
		<div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3 d-block d-md-flex">
			<div class="card text-center">
				<img class="card-img-top d-none d-sm-block" src="img/'.$row['image'].'" alt="'.$row['name'].'">
				<div class="card-body">
					<h5 class="card-title">'.$row['name'].'</h5>
					<p class="lead">'.$row['type'].'</p>
					<p class="card-text">'.$row['adress'].', <span class="text-nowrap">'.$row['zip'].' '.$row['city'].'</span> - '.$row['country'].' <a href="https://www.google.com/maps/place/'.$row['zip'].' '.$row['city'].', '.$row['adress'].'" title="show location on google maps"><i class="fas fa-map-marker-alt"></i></a></p>
				</div>
				<div class="card-footer text-muted">
					<small>Created: '.$row['c_date'].'</small>
				</div>';
		if (isset($_SESSION['admin'])){
			$result .='
				<div class="card-footer text-muted">
					<small>Last updated: '.$row['last_updated'].'</small>
				</div>';
		}
		$result.='
				<div class="card-footer">			
						<a onclick="" class="btn btn-sm btn-outline-success mx-2">details</a>';
		if (isset($_SESSION['admin'])){
			$result .='
						<a onclick="edit(\''.$row['table'].'\', '.$row['id'].')" class="btn btn-sm btn-outline-primary mx-2" data-toggle="modal" data-target="#form">edit</a>
						<a onclick="" class="btn btn-sm btn-outline-danger mx-2" data-toggle="modal" data-target="#form1">delete</a>';
		}
		$result.='			
				</div>
				
			</div>
		</div>
	';
	}
	echo $result;
}

if (isset($_POST["edit"])){
	$table = $_POST['table'] ?? '';
	$fields = '*, "'.$table.'" as "table"';
	$id = $_POST['id'] ?? '';
	$where = "WHERE id = '".$id."'";
	$rows = $obj->read($table,$fields, NULL,$where,NULL);
	$result = '';
	foreach ($rows as $row){
		$result = $row;
	}
	$result = json_encode($result);
	echo ($result);

}


 ?>