<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include ("database.php" ); 

    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $booking_date = $_POST['booking_date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $bookingId = round(microtime(true));

    $sql = "INSERT INTO booking(booking_id,name,mobile,booking_date,start_time,end_time,booking_mode) VALUES ('$bookingId','$name','$mobile','$booking_date','$start_time','$end_time','0')";
    // $result = $conn->query($sql);
    if ($conn->query($sql) === TRUE) {
  echo json_encode(true);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>