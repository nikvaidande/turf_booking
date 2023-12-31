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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />    
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
                        <label>Select Available Slot</label>
                        <div class="row" id="available_slot" name="available_slot"></div>
                        <div id="selectedSlots" class="mt-2">
                            Selected Slots: <span id="selectedSlotsOutput"></span>
                        </div>
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


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <script>
        $(document).ready(function(){
        //create date pickers
            $("#booking_date").datepicker(
            { 
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd',
                onSelect: function(booking_date)
                {
                    var booking_date = $(this).val();
                    var booking_for = $('#booking_for').val();
                    // console.log(booking_date);
                    $.ajax({
                        type:"POST",
                        url:"get_booking_slot.php",
                        data : {booking_date:booking_date, booking_for:booking_for},
                        success: function(result)
                        {
                            // console.log(result);
                            $('#available_slot').html(result);
                              // document.write(result);
                        }
                    });
                }
            });
        });

        jQuery(document).ready(function($) {
            
            $("#submit").on('click',function(e){
                e.preventDefault();

                var name = $('#name').val();
                var mobile = $('#mobile').val();
                var booking_date = $('#booking_date').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();
                var booking_time = $('#booking_slots').val();
                var booking_for = $('#booking_for').val();
                var player_count = $('#player_count').val();
                var mode = '1';
                $.ajax({
                    url : "client/add_booking.php",
                    type : "POST",
                    data : {
                            name:name,
                            mobile:mobile,
                            booking_date:booking_date,
                            start_time:start_time,
                            end_time:end_time,
                            booking_for:booking_for,
                            player_count:player_count,
                            mode:mode,
                            booking_time:booking_time
                    },
                    success : function(data){
                        Swal.fire({
                          icon: 'success',
                          title: 'Congratulations!',
                          text: 'Your Booking is confirm.',
                          // footer: '<a href="">Why do I have this issue?</a>'
                        }).then(function() {
                            window.location = "index.php";
                        });
                        // alert("Data Inserted Successfully");
                        // $("#form-body").hide();
                        // location.reload(true);
                    }
                });

            });

        } );
    </script>

    <!-- <script type="text/javascript">
        $('#booking_date').datepicker({
            dateFormat: 'yy-mm-dd' // Set the desired date format
        });

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
    </script> -->
</body>
</html>