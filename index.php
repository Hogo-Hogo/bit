<?php 
include_once 'config.php';
$sql = "SELECT * FROM url";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){ 
$zadost = $_GET['u'];
$row['url'] == $row['alias'];
if (isset($zadost))

    if ($row['alias'] == $zadost) { 
    header("Location:". $row['cil']); }
    else {
    echo "Tento záznam (" . $zadost . ") neexistuje!"; }
  }
    
}
include "vlozit.php"; 
?>
<head>
</head>
<style>body {background: linear-gradient(#333, #222, #333); color: #AF95E9;}
input:focus {box-shadow: 0 0 1em #AF95E9;}</style>
<noscript></body></noscript>
