<?php  

if (isset($_SESSION['user'])) {

?>
	<div class="navbar navbar-light bg-light" id="usermenu">
		<div class="navbar-brand"><?php echo "Welcome ".$_SESSION['user']; ?></div>
		<form class="form-inline">
			<input class="form-control mr-sm-2" style="width: 50vw" type="search" placeholder="Search" aria-label="Search">
			<button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</form>

		<a class="btn btn-sm btn-outline-danger" href="logout.php">Log Out</a>
	</div>
	<div class="container-flex">
		<nav class="row navbar navbar-expand-sm navbar-light">
			<a class="navbar-brand d-sm-none" href="#">Navbar</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-tab" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
			<div class="nav nav-tabs collapse navbar-collapse text-center justify-content-center align-items-sm-stretch" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active px-5 d-flex flex-column justify-content-end" id="location-tab" data-toggle1="collapse" data-toggle="tab" href="#location" role="tab" aria-controls="location" aria-selected="true"><h1 class="d-none d-sm-block"><i class="fas fa-map-marked-alt"></i></h1><p>Locations</p></a>
				<a class="nav-item nav-link px-5 d-flex flex-column justify-content-end" id="restaurants-tab" data-toggle="tab" href="#restaurants" role="tab" aria-controls="restaurants" aria-selected="false"><h1 class="d-none d-sm-block"><i class="fas fa-utensils d-none d-sm-block"></i></h1><p>Restaurants</p></a>
				<a class="nav-item nav-link px-5 d-flex flex-column justify-content-end" id="events-tab" data-toggle="tab" href="#events" role="tab" aria-controls="events" aria-selected="false"><h1 class="d-none d-sm-block"><i class="fas fa-ticket-alt d-none d-sm-block"></i></h1><p>Events</p></a>

			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active px-4" id="location" role="tabpanel" aria-labelledby="location-tab">
				<div class="row" id="Locations"></div>
			</div>
			<div class="tab-pane fade px-4" id="restaurants" role="tabpanel" aria-labelledby="restaurants-tab">
				<div class="row" id="Restaurants"></div>
			</div>
			<div class="tab-pane fade  px-4" id="events" role="tabpanel" aria-labelledby="events-tab">
				<div class="row" id="Events"></div>
			</div>
		</div>		
	</div>
<?php } ?>