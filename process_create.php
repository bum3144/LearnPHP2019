<?php
// var_dump($_POST);
$conn = mysqli_connect("localhost","root","autoset","learning_php");

$sql = "
  INSERT INTO topic
    (title, description, created)
  VALUES(
      '{$_POST['title']}',
      '{$_POST['description']}',
      NOW()
  )";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'ERROR ERROR';
  error_log(mysqli_error($conn));
}else{
  echo '성공 <a href="index.php">돌아가기</a>';
}
echo $sql;
 ?>
