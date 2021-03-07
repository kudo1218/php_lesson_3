<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>投稿完了ページ</title>
</head>
<body>
  <h2>投稿が完了しました。</h2>
  <form action="top.php" method="post">
    <input type="submit" value="投稿一覧へ戻る" name="back_page">
  </form>
</body>
<?php
  echo '<h2>' . 投稿内容一覧 . '</h2>';
  //DB接続
  $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
  $user = 'user';
  $pass = 'password';
  try{
    $dbh = new PDO($dsn,$user,$pass);
    //DBに値を登録
    $insert_sql = 'INSERT INTO PostData(name,text) VALUES(:name, :text)';
    $stmt = $dbh->prepare($insert_sql);
    $stmt->bindValue(':name', $_POST['user_name'], PDO::PARAM_STR);
    $stmt->bindValue(':text', $_POST['user_text'], PDO::PARAM_STR);
    $stmt->execute();
  }catch(PDOException $e) {
    echo 'DB接続エラー';
  }
?>
</html>
