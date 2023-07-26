<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>bookmyground</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
	<div class="container">
        <div class="row mb-2">
            <div class="col-md-9">
                <h1>BookMyGround</h1>
            </div>
            <div class="col-md-3">
                
            </div>
        </div>
        <div class="card mb-3" id="form-body">
            <div class="card-header">
                Insert Data
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label>Name </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group mt-2">
                        <label>Phone Number</label>
                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter Phone Number" maxlength="10" pattern="\d*">
                    </div>
                    <div class="form-group mt-2">
                        <label>Player Count</label>
                        <input type="text" class="form-control" id="player_count" name="player_count" placeholder="Enter Player Count" maxlength="10" pattern="\d*">
                    </div>
                    <div class="form-group mt-2">
                        <label>Booking Date</label>
                        <input type="text" class="form-control" id="booking_date" name="booking_date" placeholder="Enter Booking Date">
                    </div>
                    <div class="form-group mt-2">
                        <label>Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group mt-2">
                        <label>End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Enter Phone Number">
                    </div>
                    <input type="hidden" name="booking_for" id="booking_for" value="<?php echo $_GET['booking_for']; ?>">
                    <button type="submit" class="btn btn-primary mt-2" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script type="text/javascript">
    	$(document).ready(function(){
			var booking_for = $('#booking_for').val();
			$.ajax({
				url: 'get_booking_slot.php',
				type : "POST",
                data : {booking_for:booking_for},
				success: function(data){
					
					$("#customer-data").html(data);
				}
			})
		});
    </script>
</body>
</html>