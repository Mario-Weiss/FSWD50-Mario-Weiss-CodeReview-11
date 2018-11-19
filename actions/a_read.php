<?php 
session_start();
if (isset($_SESSION['user'])) {
	require "../includes/config.php";

	if (isset($_POST["render"])) {

		$fields = $_POST['fields'] ?? '*';
		$join = $_POST['join'] ?? '';
		if ($_POST['table'] == 'all'){
			$table = '(Select id,name,adress,zip,city,country,image,type,short_desc,web,NULL as phone,NULL as datetime,NULL as price,c_date,last_updated,"poi" as "table",nlikes FROM poi left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "poi" Group By location_id ) as t_like on t_like.location_id = poi.id ';
			$table .= 'UNION SELECT id,name,adress,zip,city,country,image,type,short_desc,web,phone,NULL as datetime,NULL as price,c_date,last_updated,"restaurant" as "table",nlikes FROM restaurant  left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "restaurant" Group By location_id ) as t_like on t_like.location_id = restaurant.id ';
			$table .= 'UNION SELECT id,name,adress,zip,city,country,image,type,short_desc,web,NULL as phone,datetime,price,c_date,last_updated,"event" as "table",nlikes FROM event  left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "event" Group By location_id ) as t_like on t_like.location_id = event.id) as multi';
		} elseif ($_POST['table'] == 'activities') {
			$table = '(Select id,name,adress,zip,city,country,image,type,short_desc,web,NULL as phone,NULL as datetime,NULL as price,c_date,last_updated,"poi" as "table",nlikes FROM poi left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "poi" Group By location_id ) as t_like on t_like.location_id = poi.id ';
			$table .= 'UNION SELECT id,name,adress,zip,city,country,image,type,short_desc,web,NULL as phone,datetime,price,c_date,last_updated,"event" as "table",nlikes FROM event  left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "event" Group By location_id ) as t_like on t_like.location_id = event.id) as multi';
		} else {
			$table = $_POST['table'] ?? '';
			$fields = $_POST['fields'] ?? '*, "'.$table.'" as "table",nlikes';
			$join = 'left join (SELECT location_id, COUNT(*) as nlikes FROM `likes` WHERE table_name = "'.$table.'" Group By location_id ) as t_like on t_like.location_id = '.$table.'.id';
		}
		
		
		$where = $_POST['where'] ?? '';
		if (isset($_POST['search'])) {
			$txt = $_POST['search'];
			$search = "(name like '%".$txt."%' or adress like '%".$txt."%' or zip like '%".$txt."%' or city like '%".$txt."%' or country like '%".$txt."%' or type like '%".$txt."%')";
			if ($where == '') {
				$where = "WHERE ".$search;
			} else {
				$where .= " AND ".$search;
			}
		}


		$orderby = $_POST['orderby'] ?? '';

		$rows = $obj->read($table, $fields, $join,$where,$orderby);
		$result = '';
		foreach ($rows as $row) {
			if (isset($row['price'])){
				$row['price']  = ( $row['price']== 0 ? 'free entry' : '&euro; '.$row['price']);
			}
			$result .= '
			<div class="col-12 col-md-6 col-lg-4 col-xl-3 p-3 d-block d-md-flex">
				<div class="card text-center '.$row['table'].'">
					<img class="card-img-top d-none d-sm-block" src="img/'.$row['image'].'" alt="'.$row['name'].'">
					<div class="card-body">
						<h5 class="card-title">'.$row['name'].'</h5>
						<p class="lead">'.$row['type'].'</p>
						<p class="card-text">'.$row['adress'].', <span class="text-nowrap">'.$row['zip'].' '.$row['city'].' - '.$row['country'].' <a href="https://www.google.com/maps/place/'.$row['zip'].' '.$row['city'].', '.$row['adress'].'" title="show location on google maps"><i class="fas fa-map-marker-alt"></i></span></a></p>';
			if ($row['table'] == 'restaurant') {
				$result .='
						<a href="'.$row['web'].'"><i class="fas fa-globe"></i> '.$row['web'].'</a>
    					<p><i class="fas fa-phone"></i> '.$row['phone'].'</p>';
			} elseif ($row['table'] == 'event') {
				$result .='
						<a href="'.$row['web'].'"><i class="fas fa-globe"></i> '.$row['web'].'</a>
    					<p><i class="far fa-calendar-alt"></i> &nbsp;'.$row['datetime'].'<br>
							<i class="far fa-money-bill-alt"></i> &nbsp;'.$row['price'].'</p>';
			}
			$result .='
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
							<a onclick="details(\''.$row['table'].'\', '.$row['id'].')" href="" data-toggle="modal" data-target="#details" class="btn btn-sm btn-outline-info mx-2">details</a>';
			if (isset($_SESSION['admin'])){
				$result .='
							<a onclick="edit(\''.$row['table'].'\', '.$row['id'].')" href="" class="btn btn-sm btn-outline-primary mx-2" data-toggle="modal" data-target="#form">edit</a>
							<a onclick="deleteIt(\''.$row['table'].'\', '.$row['id'].')" href="" class="btn btn-sm btn-outline-danger mx-2" data-toggle="modal" data-target="#form1">delete</a>';
			}
			$result.='		<span class="btn btn-sm btn-outline-success" onclick="like(\''.$row['table'].'\', '.$row['id'].', '.$_SESSION['user_id'].')">Like <i class="far fa-thumbs-up like"></i>&nbsp;'.$row['nlikes'].'</span>		
					</div>
					
				</div>
			</div>
		';
		}
		echo $result;
	}

	if (isset($_POST["edit"]) || isset($_POST["details"])){
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
}

 ?>