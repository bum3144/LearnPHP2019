<?php
$conn = mysqli_connect("localhost","root","autoset","learning_php");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  //<li><a href=\"index.php?id=19\">MySQL</a></li>
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

// 기본값
$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, Web'
);
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql2 = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $article ['title'] = htmlspecialchars($row2['title']);
  $article ['description'] = htmlspecialchars($row2['description']);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>PHP example 01</title>
  </head>
  <body>
    <h1><a href="index.php">WEB1</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <a href="create.php">create</a>
    <h2><?=$article['title']?></h2>
    <?=$article['description']?>
  </body>
</html>
