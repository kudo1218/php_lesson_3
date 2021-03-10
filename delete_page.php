<?php
  try{
    //DB接続
    $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
    $user = 'user';
    $pass = 'password';
    $dbh = new PDO($dsn,$user,$pass);
  }catch(PDOException $e) {
    echo 'DB接続エラー';
  }
  //DBの値を削除
  $delete_sql = 'DELETE FROM PostData WHERE id = :id';
  $stmt = $dbh->prepare($delete_sql);
  //↓$_POST[]に入れるのはbutton、ここ苦戦した
  $params = array('id'=>$_POST['hidden']);
  $stmt->execute($params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>投稿削除ページ</title>
</head>
<body>
  <h2>投稿の削除が完了しました。</h2>
  <form action="top.php" method="post">
    <input type="submit" value="投稿一覧へ戻る" name="back_page">
  </form>
</body>
</html>
