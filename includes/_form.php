
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
				<form id="formdata" accept-charset="utf-8">
					<input type="hidden" name="table" id="table">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label>Name</label>
						<input class="form-control" type="text" name="name" id="name" placeholder="Name">
					</div>
					<div class="form-group d-flex justify-content-between">
						<div class="">
							<label>Adress</label>
							<input class="form-control" type="text" name="adress" id="adress" placeholder="Adress">
						</div>
						<div class="">
							<label>Zip</label>
							<input class="form-control" type="text" name="zip" id="zip" placeholder="Zip">
						</div>
						<div class="">
							<label>City</label>
							<input class="form-control" type="text" name="city" id="city" placeholder="City">
						</div>
						<div class="">
							<label>Country</label>
							<input class="form-control" type="text" name="country" id="country" placeholder="Country">
						</div>
					</div>
					<div class="form-group">
						<label>Image</label>
						<input class="form-control" type="text" name="image" id="image" placeholder="Image">
					</div>
					<div class="form-group">
						<label>Type</label>
						<input class="form-control" type="text" name="type" id="type" placeholder="Type">
					</div>
					<div class="form-group">
						<label>Short Description</label>
						<textarea class="form-control" type="text" name="short_desc" id="short_desc" placeholder="Short Description"></textarea>
					</div>
					<div class="form-group">
						<label>Web adress</label>
						<input class="form-control" type="text" name="web" id="web" placeholder="Web adress">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" onclick="update($('#form'))" data-dismiss="modal" class="btn btn-primary">Save changes</button>
			</div>
			<div id="test">
				
			</div>
		</div>
	</div>
</div>
