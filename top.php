<?php
  $no = 0;
  try{
    //DB接続
    $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
    $user = 'user';
    $pass = 'password';
    $dbh = new PDO($dsn,$user,$pass);
    //DBから値を取得
    $select_sql = 'SELECT * FROM PostData';
    $stmt = $dbh->query($select_sql);
  }catch(PDOException $e) {
    echo 'DB接続エラー';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>課題3</title>
</head>
<body>
  <h1>掲示板</h1>
  <h2>新規投稿</h2>
  <form action="done_page.php" method="post">
    name: <input type="text" name="user_name"><br>
    投稿内容: <br>
    <textarea rows="20" cols="30" name="user_text"></textarea><br>
    <input type="submit" value="投稿">
  </form>
<?php foreach($stmt as $value): ?>
  <?php $no++; ?>
  <table width="300" border="1">
    <form action="delete_page.php" method="post">
      No <?php echo $no ?><br>
      名前: <?php echo $value['name'] ?><br>
      投稿内容: <?php echo $value['text'] ?><br>
      <input type="hidden" name="hidden" value="<?php echo $value['id'] ?>">
      <button name="button">削除</button>
    </form>
  </table>
<?php endforeach; ?>
</body>
</html>
