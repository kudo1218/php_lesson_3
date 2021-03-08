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
    if(!empty($_POST['back_page'])){
      //DB接続
      $dsn = 'mysql:host=localhost;dbname=php_lesson_3;charset=utf8';
      $user = 'user';
      $pass = 'password';
      try{
        $dbh = new PDO($dsn,$user,$pass);
        //DBから値を取得
        $select_sql = 'SELECT * FROM PostData';
        $stmt = $dbh->query($select_sql);
        foreach($stmt as $value){
          echo '<table width="300" border="1">';
          echo '<form action="delete_page.php" method="post">';
          echo 'No:' . $value['id'] . '<br>';
          echo '名前:' . $value['name'] . '<br>';
          echo '投稿内容:' . $value['text'] . '<br>';
          //↓この値設定の仕方ができて良かった
          echo '<button name="button" value="' . $value['id'] . '">削除</button>';
          echo '</form>';
          echo '</table>' . '<br>';
        }
      }catch(PDOException $e) {
        echo 'DB接続エラー';
      }
    }
  ?>
</body>
</html>
