<?php
$conn = mysqli_connect("localhost","root","autoset","learning_php");

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  //<li><a href=\"index.php?id=19\">MySQL</a></li>
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}

// 기본값
$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, Web'
);
if(isset($_GET['id'])){
  $sql2 = "SELECT * FROM topic WHERE id={$_GET['id']}";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_array($result2);
  $article ['title'] = $row2['title'];
  $article ['description'] = $row2['description'];
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
  <h2>Welcome</h2>
  <form action="process_create.php" method="post">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>
