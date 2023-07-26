<?php 
// Database connection info 
$dbDetails = array( 
'host' => 'localhost', 
'user' => 'root', 
'pass' => '', 
'db'   => 'turf_db'
); 
// mysql db table to use 
$table = 'turf_details'; 
// Table's primary key 
$primaryKey = 'id'; 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
array( 'db' => 'turf_name', 'dt' => 0 ), 
array( 'db' => 'manager_name',  'dt' => 1 ), 
array( 'db' => 'contact_number',  'dt' => 2 ), 
array( 'db' => 'turf_address',  'dt' => 3 ), 
array( 'db' => 'location',  'dt' => 4 ), 
array( 'db' => 'start_date',  'dt' => 5 ), 
array( 'db' => 'end_date',  'dt' => 6 ), 
 
array( 
'db'        => 'id',
'dt'        => 7, 
'formatter' => function( $d, $row ) { 
return '<a href="javascript:void(0)" class="btn btn-primary btn-edit" data-id="'.$row['id'].'"> Edit </a>
		<a href="./client/index.php?booking_for='.base64_encode($row['id']).'" class="btn btn-primary">Link </a>'; 
} 
) 
); 
// Include SQL query processing class 
require 'ssp.class.php'; 
// Output data as json format 
echo json_encode( 
SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns ));