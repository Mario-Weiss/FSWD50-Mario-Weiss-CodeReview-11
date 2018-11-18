<?php  
if (isset($_SESSION['user'])) {
?>
<!-- Modal -->
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="detailsTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="detailsTitle"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div>
					<img id="details_image" class="w-100" src="" alt="">
					<div>
						<h1 class="text-center my-3" id="details_name"></h1>
						<h4>Category: <small id="details_table"></small></h4>
						<h4>Type: <small id="details_type"></small></h4>
						<h4>Adress: <small id="details_adress"></small></h4>
						<h4 class="location restaurant">Phone: <small id="details_phone"></small></h4>
						<h4>Web: <small id="details_web"></small></h4>
						<h4 class="location event">Date: <small id="details_datetime"></small></h4>
						<h4 class="location event">Price: <small id="details_price"></small></h4>
						<h4>Short description:</h4>
						<h4><small id="details_short_desc"></small></h4>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			<div id="test">
				
			</div>
		</div>
	</div>
</div>
<?php } ?>
