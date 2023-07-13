<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Turf Listing</title>
	<!-- DataTables CSS library -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<!-- DataTables JS library -->
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<style type="text/css">
		.bs-example{
			margin: 20px;
		}
	</style>
</head>
<body>
	<div class="bs-example">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="page-header clearfix">
						<h2 class="float-left">Users List</h2>
						<a href="javascript:void(0)" class="btn btn-primary float-right add-model"> Add User </a>
					</div>
					<table id="usersListTable" class="display" style="width:100%">
						<thead>
							<tr>
								<th>Turf Name</th>
								<th>Manager Name</th>
								<th>Contact Name</th>
								<th>Address</th>
								<th>Location</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Turf Name</th>
								<th>Manager Name</th>
								<th>Contact Name</th>
								<th>Address</th>
								<th>Location</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Action</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>        
		</div>
	</div>
</body>
<div class="modal fade" id="edit-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="userCrudModal"></h4>
			</div>
			<div class="modal-body">
				<form id="update-form" name="update-form" class="form-horizontal">
					<input type="hidden" name="id" id="id">
					<input type="hidden" class="form-control" id="mode" name="mode" value="update">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-12">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="" required="">
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
						</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="add-modal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="userCrudModal">Add Turf Details</h4>
			</div>
			<div class="modal-body">
				<form id="add-form" name="add-form" class="form-horizontal" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" id="mode" name="mode" value="add">
					<div class="form-group">
						<label for="name" class="col-sm-12 control-label">Turf Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="turf_name" name="turf_name" placeholder="Enter Turf Name" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="name" class="col-sm-12 control-label">Manager Name</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="manager_name" name="manager_name" placeholder="Enter Manager Name" value="" maxlength="50" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Contact Number</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Enter Contact Number" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Address</label>
						<div class="col-sm-12">
							<textarea class="form-control" id="address" name="address" placeholder="Enter Address"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Location</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="location" name="location" placeholder="Enter Location" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Description</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Amount</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Images</label>
						<div class="col-sm-12">
							<input type="file" class="form-control-file" id="files" name="files[]" multiple placeholder="Enter Contact Number" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Start Date</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter Start Date" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">End Date</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="end_date" name="end_date" placeholder="Enter End Date" value="" required="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Latitude</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="latitude" name="latitude" placeholder="" value="" required="" readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-12 control-label">Longitude</label>
						<div class="col-sm-12">
							<input type="text" class="form-control" id="longitude" name="longitude" placeholder="" value="" required="" readonly>
						</div>
					</div>
					<div class="col-sm-offset-12 col-sm-10">
						<button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
						</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
	    if(navigator.geolocation){
	        navigator.geolocation.getCurrentPosition(showLocation);
	    }else{ 
	        $('#location').html('Geolocation is not supported by this browser.');
	    }
	});

	function showLocation(position){
	    var latitude = position.coords.latitude;
	    var longitude = position.coords.longitude;
	    $.ajax({
	        type:'POST',
	        url:'getTurfPosition.php',
	        data:'latitude='+latitude+'&longitude='+longitude,
	        success:function(msg){
	        	$('#latitude').val(latitude);
	        	$('#longitude').val(longitude);
	        	// localStorage.setItem("latitude", latitude);
	        	// localStorage.setItem("longitude", longitude);
			}
	    });
	}


	$(document).ready(function(){
		$('#usersListTable').DataTable({
			"processing": true,
			"serverSide": true,
			"order": [],
			"ajax": "fetch.php"
		});


		// Initialize datepicker
	    $('#start_date').datepicker({
	        dateFormat: 'yy-mm-dd' // Set the desired date format
	    });

	    $('#end_date').datepicker({
	        dateFormat: 'yy-mm-dd' // Set the desired date format
	    });
	});

	/*  add user model */
		$('.add-model').click(function () {
			$('#add-modal').modal('show');
		});
	// add form submit
		$('#add-form').submit(function(e){
		e.preventDefault();
		
		// ajax
		$.ajax({
			url:"add-edit-delete.php",
			type: "POST",
			data: $(this).serialize(), // get all form field value in serialize form
			success: function(){
				var oTable = $('#usersListTable').dataTable(); 
				oTable.fnDraw(false);
				$('#add-modal').modal('hide');
				$('#add-form').trigger("reset");
			}
		});
	});  
/* edit user function */
	$('body').on('click', '.btn-edit', function () {
		var id = $(this).data('id');
		$.ajax({
			url:"add-edit-delete.php",
			type: "POST",
			data: {
				id: id,
				mode: 'edit' 
			},
			dataType : 'json',
			success: function(result){
				$('#id').val(result.id);
				$('#name').val(result.name);
				$('#email').val(result.email);
				$('#edit-modal').modal('show');
			}
		});
	});
// add form submit
	$('#update-form').submit(function(e){
		e.preventDefault();
// ajax
		$.ajax({
			url:"add-edit-delete.php",
			type: "POST",
data: $(this).serialize(), // get all form field value in serialize form
success: function(){
	var oTable = $('#usersListTable').dataTable(); 
	oTable.fnDraw(false);
	$('#edit-modal').modal('hide');
	$('#update-form').trigger("reset");
}
});
	});  
/* DELETE FUNCTION */
	$('body').on('click', '.btn-delete', function () {
		var id = $(this).data('id');
		if (confirm("Are You sure want to delete !")) {
			$.ajax({
				url:"add-edit-delete.php",
				type: "POST",
				data: {
					id: id,
					mode: 'delete' 
				},
				dataType : 'json',
				success: function(result){
					var oTable = $('#usersListTable').dataTable(); 
					oTable.fnDraw(false);
				}
			});
		} 
		return false;
	});
</script>
</html>