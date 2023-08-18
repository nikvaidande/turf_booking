<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
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
    <?php
        include ("database.php" );


        if($_GET['booking_for']){
            $booking_for = base64_decode($_GET['booking_for']);
            // echo $_GET['booking_for']; exit;
            $today = date('Y-m-d');
             
            $sql = "SELECT * FROM booking where booking_for = '$booking_for' AND booking_date = '$today'";
            $result = mysqli_query($conn,$sql);    
        }else{
            echo '<h1>Please contact administer</h1>'; exit;
        }
        
    ?>
    <div class="container-fluid" style="margin-top:30px !important;">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-9">
                    <h1>BookMyGround</h1>
                </div>
                <div class="col-md-3">
                    <button type="button" id="insert-btn" class="btn btn-primary" style="float: right;">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
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
                            <select class="form-control" id="available_slot" name="available_slot">
                                <option>Select Slot</option>
                            </select>
                            <!-- <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Enter Phone Number"> -->
                        </div>
                        <input type="hidden" name="booking_for" id="booking_for" value="<?php echo $_GET['booking_for']; ?>">
                        <button type="submit" class="btn btn-primary mt-2" id="submit">Submit</button>
                    </form>
                </div>
            </div>



            <table id="tblUser">
                <thead>
                    <th>Booking Id</th>
                    <th>Name</th>
                    <th>Contact no</th>
                    <th>Booking Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach($result as $key => $booking) {
                        if($booking['booking_mode'] == 0){
                            $bgcolor = "#e0fad2" ;
                        }else if($booking['booking_mode'] == 1){
                            $bgcolor = "#fff3cc" ;
                        }
                     ?>
                        <tr style="background: <?php echo $bgcolor; ?>">
                            <!-- <td><?php echo ++$key; ?></td> -->
                            <td><?php echo $booking['booking_id']; ?></td>
                            <td><?php echo $booking['name']; ?></td>
                            <td><?php echo $booking['mobile']; ?></td>
                            <td><?php echo $booking['booking_date']; ?></td>
                            <td><?php echo $booking['start_time']; ?></td>
                            <td><?php echo $booking['end_time']; ?></td>
                            <td>
                                <a href="edit_booking.php?id=<?php echo $booking['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    jQuery(document).ready(function($) {
        
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
                    url:"../get_booking_slot.php",
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
        

        $('#tblUser').DataTable();
        $("#form-body").hide();

        // Initialize datepicker
        $('#booking_date').datepicker({
            dateFormat: 'yy-mm-dd' // Set the desired date format
        });

        $("#insert-btn").on('click',function(){
            $("#form-body").toggle(500);
        });

        $("#submit").on('click',function(e){
            e.preventDefault();

            var name = $('#name').val();
            var mobile = $('#mobile').val();
            var booking_date = $('#booking_date').val();
            var start_time = $('#start_time').val();
            var end_time = $('#end_time').val();
            var booking_time = $('#available_slot').val();
            var booking_for = $('#booking_for').val();
            var player_count = $('#player_count').val();
            var mode = '0';
            $.ajax({
                url : "add_booking.php",
                type : "POST",
                data : {name:name,mobile:mobile,booking_date:booking_date,start_time:start_time,end_time:end_time,booking_for:booking_for,player_count:player_count,mode:mode,booking_time:booking_time},
                success : function(data){
                    alert("Data Inserted Successfully");
                    $("#form-body").hide();
                    location.reload(true);
                }
            });

        });

    } );
    </script>

</body>
</html>