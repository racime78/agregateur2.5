<?php
require('config.php');

$searchTerm = $_GET['q'];

// Requête pour rechercher les régions
$sql = "SELECT ID_VilleRegion, Region FROM ville WHERE Region LIKE '%".$conn->real_escape_string($searchTerm)."%' LIMIT 10";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = array("id" => $row['ID_VilleRegion'], "text" => $row['Region']);
  }
}

echo json_encode($data);

$conn->close();
?>
