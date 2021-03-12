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
  <!-- 投稿フォーム -->
  <form action="insert_page.php" method="post">
    name: <input type="text" name="user_name"><br>
    投稿内容: <br>
    <textarea rows="20" cols="30" name="user_text"></textarea><br>
    <input type="submit" value="投稿">
  </form>
  <h2>投稿内容一覧</h2>
  <?php foreach($stmt as $value): ?>
    <?php $no++ ?>
    <!--DBの値を表示-->
    <table width="300" border="1">
      No: <?php echo $no ?><br>
      名前: <?php echo $value['name'] ?><br>
      投稿内容: <?php echo $value['text'] ?><br>
      <!--編集ボタン-->
      <form action="update_form_page.php" method="post">
        <input type="hidden" name="update_button" value="<?php echo $value['id'] ?>">
        <button name="button">編集</button>
      </form><br>
      <!--削除ボタン-->
      <form action="delete_page.php" method="post">
        <input type="hidden" name="delete_button" value="<?php echo $value['id'] ?>">
        <button name="button">削除</button>
      </form>
    </table><br>
  <?php endforeach; ?>
</body>
</html>
