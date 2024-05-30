<?php
require('config.php');

$search = $_GET['q'];
$sql = "SELECT ID_VilleRegion, NomV FROM ville WHERE NomV LIKE '%$search%' LIMIT 10";
$result = $conn->query($sql);

$villes = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $villes[] = [
      'id' => $row['ID_VilleRegion'],
      'text' => $row['NomV']
    ];
  }
}

echo json_encode($villes);
$conn->close();
?>
