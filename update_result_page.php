<?php
  try{
    $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
    $user = 'user';
    $pass = 'password';
    $dbh = new PDO($dsn,$user,$pass);
    //対象IDのデータを更新
    $update_sql = 'UPDATE PostData SET name = :name, text = :text WHERE id = :id';
    $stmt = $dbh->prepare($update_sql);
    $params = array('name'=>$_POST['user_name_edit'],'text'=>$_POST['user_text_edit'],'id'=>$_POST['update_button']);
    $stmt->execute($params);
  }catch(PDOException $e) {
    echo 'DB接続エラー';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>編集完了ページ</title>
</head>
<body>
  <h2>編集が完了しました。</h2>
  <form action="top.php" method="post">
    <input type="submit" value="投稿一覧へ戻る" name="back_page">
  </form>
</body>
</html>
