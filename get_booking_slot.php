<?php
    include ("database.php" );

    if($_POST['booking_for']){
        $booking_for = base64_decode($_POST['booking_for']);
        // echo $_GET['booking_for']; exit;
        $today = date('Y-m-d');
         
        $sql = "SELECT * FROM turf_details where id = '$booking_for'";
        $getslot = $conn->query($sql);
        if ($getslot->num_rows > 0) {
        	// $getSlotData = array();
		  	while($row = $getslot->fetch_assoc()) {
			   $start_time = $row['open_time'];
			   $end_time = $row['close_time'];

			   // array_push($getSlotData, $data);
			}
			// echo $end_time; exit;
			$start = new DateTime($start_time);
		    $end = new DateTime($end_time);
		    $startTime = $start->format('H:i');
		    $endTime = $end->format('H:i');
		    $i=0;
		    $time = [];
		    while(strtotime($startTime) <= strtotime($endTime)){
		        $start = $startTime;
		        $end = date('H:i',strtotime('+60 minutes',strtotime($startTime)));
		        $startTime = date('H:i',strtotime('+60 minutes',strtotime($startTime)));
		        $i++;
		        if(strtotime($startTime) <= strtotime($endTime)){
		            $time[$i]['slot_start_time'] = $start;
		            $time[$i]['slot_end_time'] = $end;
		        }
		    }
		    echo '<pre>';
		    print_r($time);
		}
    }else{
        echo '<h1>Please contact administer</h1>'; exit;
    }
    
?>