<?php
  $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
  $user = 'user';
  $pass = 'password';
  $dbh = new PDO($dsn,$user,$pass);
  //対象IDの値を取得
  $select_sql = 'SELECT * FROM PostData WHERE id = :id';
  $stmt = $dbh->prepare($select_sql);
  $params = array('id'=>$_POST['update_button']);
  $stmt->execute($params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>編集ページ</title>
</head>
<body>
  <h2>編集ページ</h2>
  <?php foreach($stmt as $value): ?>
  <!--編集フォーム-->
  <form action="update_result_page.php" method="post">
    name: <input type="text" name="user_name_edit" value="<?php echo $value['name'] ?>"><br>
    投稿内容: <br>
    <textarea rows="20" cols="30" name="user_text_edit"><?php echo $value['text'] ?></textarea><br>
    <input type="hidden" name="update_button" value="<?php echo $_POST['update_button'] ?>">
    <button name="button">更新</button>
  </form>
  <?php endforeach; ?>
  <form action="top.php" method="post">
    <input type="submit" value="戻る" name="back_page">
  </form>
</body>
</html>
