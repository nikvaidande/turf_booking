<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection info 
// $host='localhost';
// $username='root';
// $password='root';
// $dbname = "turf_db";
// $conn=mysqli_connect($host,$username,$password,"$dbname");

include('database.php'); 


if ($_POST['mode'] === 'add') {
$turf_name = $_POST['turf_name'];
$manager_name = $_POST['manager_name'];
$contact_number = $_POST['contact_number'];
$address = $_POST['address'];
$location = $_POST['location'];
$description = $_POST['description'];
$amount = $_POST['amount'];
$images = $_FILES['files']['name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
// mysqli_query($conn, "INSERT INTO turf_details (turf_name,manager_name,contact_number,turf_address,location,description,amount,start_date,end_date)
// VALUES ('$turf_name','$manager_name','$manager_name','$contact_number','$address','$location','$description','$amount','$start_date','$end_date')");

// Handle the uploaded images
$imageDirectory = './images/'; // Specify the directory where you want to save the images

$allowTypes = array('jpg','png','jpeg','gif');

$statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
$fileNames = array_filter($images);

if(!empty($fileNames)){ 
  foreach($_FILES['files']['name'] as $key=>$val){ 
      // File upload path 
      $fileName = basename($_FILES['files']['name'][$key]); 
      $targetFilePath = $targetDir . $fileName; 
       
      // Check whether file type is valid 
      $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
      if(in_array($fileType, $allowTypes)){ 
          // Upload file to server 
          if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
              // Image db insert sql 
              $insertValuesSQL .= "('".$fileName."', NOW()),"; 
          }else{ 
              $errorUpload .= $_FILES['files']['name'][$key].' | '; 
          } 
      }else{ 
          $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
      } 
  }

  echo $insertValuesSQL; exit;
}
  // Error message 
    //     $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    //     $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    //     $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
         
    //     if(!empty($insertValuesSQL)){ 
    //         $insertValuesSQL = trim($insertValuesSQL, ','); 
    //         // Insert image file name into database 
    //         $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
    //         if($insert){ 
    //             $statusMsg = "Files are uploaded successfully.".$errorMsg; 
    //         }else{ 
    //             $statusMsg = "Sorry, there was an error uploading your file."; 
    //         } 
    //     }else{ 
    //         $statusMsg = "Upload failed! ".$errorMsg; 
    //     } 
    // }else{ 
    //     $statusMsg = 'Please select a file to upload.'; 
    // }  



exit;
$sql = 'INSERT INTO turf_details (turf_name,manager_name,contact_number,turf_address,location,description,amount,start_date,end_date,latitude,longitude)
VALUES ("'.$turf_name.'","'.$manager_name.'","'.$contact_number.'","'.$address.'","'.$location.'","'.$description.'","'.$amount.'","'.$start_date.'","'.$end_date.'","'.$latitude.'","'.$longitude.'")';

if ($conn->query($sql) === TRUE) {
  echo json_encode(true);
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}  
if ($_POST['mode'] === 'edit') {
$result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_POST['id'] . "'");
$row= mysqli_fetch_array($result);
echo json_encode($row);
}   
if ($_POST['mode'] === 'update') {
mysqli_query($conn,"UPDATE users set  name='" . $_POST['name'] . "', email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
echo json_encode(true);
}  
if ($_POST['mode'] === 'delete') {
mysqli_query($conn, "DELETE FROM users WHERE id='" . $_POST["id"] . "'");
echo json_encode(true);
}  
?>