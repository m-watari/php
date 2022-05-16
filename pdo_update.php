<?php
require_once('Connections/connect.php');

try {
   // DBへ接続
   $dbh = new PDO( "mysql:host=" . $hostname_xxx . ";dbname=" . $database_xxx . ";charset=UTF8;", $username_xxx, $password_xxx );
   // SQL作成
   $updateSQL = 'update table_name set col1 =:col1, col2=:col2 where id = :id';
    $stmt = $dbh->prepare( $updateSQL );
    $stmt->bindParam( ':col1', $col1, PDO::PARAM_STR );
    $stmt->bindParam( ':col2', $col2, PDO::PARAM_STR );
    $stmt->bindValue( ':id', $id, PDO::PARAM_INT );
    $stmt->execute();
    // SQL実行
    $stmt = $dbh->query( $updateSQL );
  } catch ( PDOException $e ) {
    echo $e->getMessage();
    die();
  }
  // 接続を閉じる
  $dbh = null;