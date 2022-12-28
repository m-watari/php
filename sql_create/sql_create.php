<?php require_once('./Connections/conection.php'); ?>
<?php
// a_name.txtを読み込む
$fp = fopen("a_name.txt", "r");
while (!feof($fp)) {
   $line = fgets($fp);
   $a_name[] = $line;
}
// $a_nameをループで表示
$count = 0;
foreach ($a_name as $value) {
   $a_name2 = preg_split('/\s+/', $value);

   $database = new PDO("mysql:host=".$hostname_fx.";dbname=".$database_fx.";charset=UTF8;", $username_fx, $password_fx);
   $query_Recordset1 = "SELECT column1, column2 FROM table_name WHERE id = :id";
   $Recordset1 = $database->prepare( $query_Recordset1 );
   $Recordset1->bindValue( ':id', $a_name2[1], PDO::PARAM_INT );
   $Recordset1->execute();
   $row_Recordset1 = $Recordset1->fetch(PDO::FETCH_ASSOC);
   $totalRows_Recordset1 = $Recordset1->rowCount();

   if($totalRows_Recordset1 == 0) {
      continue;
   }

   // sql発行の場合
   echo "UPDATE table_name SET column3 = '{$a_name2[0]}' WHERE id = '{$a_name2[1]}';";
   echo '</br>';

   // 直接DBに接続して更新する場合
   try {
      // DBへ接続
      $dbh = new PDO( "mysql:host=" . $hostname_fx . ";dbname=" . $database_fx . ";charset=UTF8;", $username_fx, $password_fx );
      // SQL作成
      $updateSQL = "UPDATE table_name SET column3 = '{$a_name2[0]}' WHERE id = '{$row_Recordset1['id']}'";
      $stmt = $dbh->prepare( $updateSQL );
      $stmt->execute();
      // SQL実行
      $stmt = $dbh->query( $updateSQL );
    } catch ( PDOException $e ) {
      echo $e->getMessage();
      die();
    }

   // 接続を閉じる
   $database = null;
   $query_Recordset1 = null;
   $Recordset1 = null;
   $count ++;
}
print '<br>';
print 'count: '.$count;
print '</br>';