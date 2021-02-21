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

<!-- //   <!DOCTYPE html>
//   <html lang="en">
//   <head>
//       <meta charset="UTF-8">
//       <meta http-equiv="X-UA-Compatible" content="IE=edge">
//       <meta name="viewport" content="width=device-width, initial-scale=1.0">
//       <title>Document</title>
//   </head>
//   <body>
//   <h1>JSON</h1>
//   <?php echo json_encode($resulst); ?> -->

  <!-- <h1>Movies</h1>

  <?php foreach ($results as $movie){ ?>

    <ul><h2>Title: <?php echo $movie['title'] ?></h2>
        <li>Original title: <?php echo $movie['original_title'] ?></li>
        <li>Overview: <?php echo $movie['overview'] ?></li>
        <li>Director: <?php echo $movie['director'] ?></li>
        <li>Screenwriter: <?php echo $movie['screenwriter'] ?></li>
        <li>Cast: <?php echo $movie['cast'] ?></li>
        <li>Release date: <?php echo $movie['release_date'] ?></li>
        <li>Running time: <?php echo $movie['running_time'] ?></li>
        <li>Genre: <?php echo $movie['genre'] ?></li>
        <li>Country: <?php echo $movie['country'] ?></li>
        <li>Vote count: <?php echo $movie['vote_count'] ?></li>
        <li>Awards: <?php echo $movie['awards'] ?></li>
        <li>Critics reviews: <?php echo $movie['critics_reviews'] ?></li>
    </ul>

  <?php } ?> -->
      
  </body>
  </html>
