<?php  
if (isset($_SESSION['admin'])) {
?>
<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="formTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="formTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formdata" class="was-validated" accept-charset="utf-8">
					<div id="table">
						<div class="form-group d-flex justify-content-around">
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="table" id="poi" value="poi" checked="checked" required>
								<label class="custom-control-label" for="poi">Point of interest</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="table" id="restaurant" value="restaurant" required>
								<label class="custom-control-label" for="restaurant">Restaurant</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" class="custom-control-input" name="table" id="event" value="event" required>
								<label class="custom-control-label" for="event">Event</label>
							</div>
							<div class="invalid-feedback">More example invalid feedback text</div>
						</div>
						
					</div>
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" id="name" placeholder="Name" required>
					</div>
					<div class="form-group d-flex justify-content-between">
						<div>
							<label>Adress</label>
							<input class="form-control" type="text" name="adress" id="adress" placeholder="Adress" style="min-width: 25vw" required>
						</div>
						<div class="mx-2">
							<label>Zip</label>
							<input class="form-control" type="text" name="zip" id="zip" placeholder="Zip" required>
						</div>
						<div class="mr-2">
							<label>City</label>
							<input class="form-control" type="text" name="city" id="city" placeholder="City" required>
						</div>
						<div class="">
							<label>Country</label>
							<input class="form-control" type="text" name="country" id="country" placeholder="Country" required>
						</div>
					</div>
					<div class="form-group location restaurant w-100">
						<label>Phone number</label>
						<input class="form-control" type="text" name="phone" id="phone" placeholder="Phone number" required>
					</div>
					<div class="form-group d-flex justify-content-center">
						<div class="mr-2 location event">
							<label>Date & Time</label>
							<input class="form-control" type="datetime-local" name="datetime" id="datetime" placeholder="Date & Time" required>
						</div>
						<div class="location event">
							<label>Price</label>
							<input class="form-control" type="number" step="0.01" name="price" id="price" placeholder="Price" required>
						</div>
					</div>
					<div class="form-group">
						<label>Web adress</label>
						<input class="form-control" type="text" name="web" id="web" placeholder="Web adress" required>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input class="form-control" type="text" name="image" id="image" placeholder="Image" required>
					</div>
					<div class="form-group">
						<label>Type</label>
						<input class="form-control" type="text" name="type" id="type" placeholder="Type" required>
					</div>
					<div class="form-group">
						<label>Short Description</label>
						<textarea class="form-control" type="text" name="short_desc" id="short_desc" placeholder="Short Description" required></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" id="btn-submit" onclick="update()" data-dismiss="modal" class="btn btn-primary">Save changes</button>
			</div>
			<div id="test">
				
			</div>
		</div>
	</div>
</div>
<?php } ?>
