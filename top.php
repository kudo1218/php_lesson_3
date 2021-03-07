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
  <?php
    echo '<h2>' . 投稿内容一覧 . '</h2>';
    //DB接続
    $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
    $user = 'user';
    $pass = 'password';
    try{
      $dbh = new PDO($dsn,$user,$pass);
      echo 'DB接続成功';
    }catch(PDOException $e) {
      echo 'DB接続エラー';
    }

    //DBに値を登録
    $user_name = $_POST['user_name'];
    $user_text = $_POST['user_text'];
    $insert_sql = 'INSERT INTO PostData(name) VALUES(:name)';
    $insert_stmt = $dbh->prepare($insert_sql);
    $insert_stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
    $insert_stmt->execute();

    //DBから値を取得
    $select_sql = 'SELECT * FROM PostData';
    $select_stmt = $dbh->query($sql);
    foreach($stmt as $value) {
      echo $value['text'];
    }
  ?>
</body>
</html>
