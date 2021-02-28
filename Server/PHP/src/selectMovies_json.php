<?php 

require "includes/connection.php";
//require "includes/cors";

header("content-type: application/json");

try {

    $stmt = $conn->prepare("SELECT * FROM Movies");
    $stmt->execute();
    $stmt-> setFetchMOde(PDO:: FETCH_ASSOC);
    $movies = $stmt-> fetchAll();
    // foreach($resulsts as $result) {
    //   print_r($result);
    // }
  } catch(PDOException $e) {
      echo "Error: " . $sql . "<br>" . $e->getMessage();
  }
  
  // Una vez terminado, cerramos la conexión
$conn = null;

echo json_encode($movies, JSON_PRETTY_PRINT);

  ?>
