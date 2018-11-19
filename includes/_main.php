<?php  

if (isset($_SESSION['user'])) {

?>
	<div class="navbar navbar-light bg-light sticky-top" id="usermenu">
		<div class="navbar-brand"><?php echo "Welcome ".$_SESSION['user']; ?></div>
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="Filter" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Filter
			</a>
			<div class="dropdown-menu" aria-labelledby="Filter">
			<a class="dropdown-item" onclick="changeView('all')" >show all</a>
			<a class="dropdown-item" onclick="changeView('activities')" >Activities</a>
			<a class="dropdown-item" onclick="changeView('poi')" >Points of Interest</a>
			<a class="dropdown-item" onclick="changeView('restaurant')" >Restaurants</a>
			<a class="dropdown-item" onclick="changeView('event')" >Events</a>
			</div>
		</div>
		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="Sort" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  Sort
			</a>
			<div class="dropdown-menu" aria-labelledby="Sort">
			<a class="dropdown-item">Name: <i onclick="sort('name asc')" class="fas fa-angle-up"></i> <i onclick="sort('name desc')" class="fas fa-angle-down"></i></a>
			<a class="dropdown-item">Category: <i onclick="sort('`table` asc')" class="fas fa-angle-up"></i> <i onclick="sort('`table` desc')" class="fas fa-angle-down"></i></a>
			<a class="dropdown-item">Type: <i onclick="sort('`type` asc')" class="fas fa-angle-up"></i> <i onclick="sort('`type` desc')" class="fas fa-angle-down"></i></a>
			<a class="dropdown-item">Date created: <i onclick="sort('`c_date` asc')" class="fas fa-angle-up"></i> <i onclick="sort('`c_date` desc')" class="fas fa-angle-down"></i></a>
			<a class="dropdown-item">Likes: <i onclick="sort('`nlikes` asc')" class="fas fa-angle-up"></i> <i onclick="sort('`nlikes` desc')" class="fas fa-angle-down"></i></a>
			</div>
		</div>
		<form class="form-inline">
			<input class="form-control mr-sm-2" style="width: 50vw" type="search" id="search_text" placeholder="Search" aria-label="Search">
			<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>
<?php if (isset($_SESSION['admin'])){ ?>

		<a class="btn btn-sm btn-outline-primary" href="" data-toggle="modal" data-target="#form" onclick="createNew()">Create new</a>

<?php } ?>
		<a class="btn btn-sm btn-outline-danger" href="logout.php">Log Out</a>
	</div>
	<div class="container-flex">
		<div class="row" id="Locations"></div>	
	</div>
<?php } ?>