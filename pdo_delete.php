<?php
require_once('Connections/connect.php');

try {
   // DBへ接続
   $dbh = new PDO( "mysql:host=" . $hostname_xxx . ";dbname=" . $database_xxx . ";charset=UTF8;", $username_xxx, $password_xxx );
   // SQL作成
   $deleteSQL = 'DELETE FROM table_name WHERE id=:id';
    $stmt = $dbh->prepare($deleteSQL);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    // SQL実行
    $stmt = $dbh->query($deleteSQL);
  } catch (PDOException $e) {
    echo $e->getMessage();
    die();
  }
  // 接続を閉じる
  $dbh = null;