<?php
include('database.php'); 
$searchTerm = $_POST['search'];
$sql = "SELECT DISTINCT id,Area FROM areas WHERE Area LIKE '%".$searchTerm."%'"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
  $tutorialData = array(); 
  while($row = $result->fetch_assoc()) {
   $data['id']    = $row['id']; 
   $data['value'] = $row['Area'];
   array_push($tutorialData, $data);
} 
}
 echo json_encode($tutorialData);
?>