<?php
$conn = mysqli_connect("localhost","root","autoset","learning_php");


echo "<h1>single row</h1>";
$sql = " SELECT * FROM topic where id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
//var_dump($result->num_rows);
//print_r($row);
echo '<h2>'.$row['title'].'</h2>';
echo $row['description'];


echo "<h1>multi row</h1>";
$sql = " SELECT * FROM topic";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
  echo '<h2>'.$row['title'].'</h2>';
  echo $row['description'];
}




// $row = mysqli_fetch_array($result);
// var_dump($row);
 ?>