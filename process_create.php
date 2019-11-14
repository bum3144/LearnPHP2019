<?php
// var_dump($_POST);
$conn = mysqli_connect("localhost","root","autoset","learning_php");


$filtered = array(
    'title'=>mysqli_real_escape_string($conn, $_POST['title']),
    'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);

$sql = "
  INSERT INTO topic
    (title, description, created)
  VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW()
  )";

//die($sql);

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'ERROR ERROR';
  error_log(mysqli_error($conn));
}else{
  echo '성공 <a href="index.php">돌아가기</a>';
}
//echo $sql;
 ?>
