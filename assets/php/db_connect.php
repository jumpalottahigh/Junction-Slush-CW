<?php
  /*
  Server: rhtgpa0248.database.windows.net,1433
  SQL Database: carlswifesdb
  User Name: carl

  PHP Data Objects(PDO) Sample Code:
  */

  try {
     $conn = new PDO ( "sqlsrv:server = tcp:rhtgpa0248.database.windows.net,1433; Database = carlswifesdb", "carl", "{your_password_here}");
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  }
  catch ( PDOException $e ) {
     print( "Error connecting to SQL Server." );
     die(print_r($e));
  }
  
  /* SQL Server Extension Sample Code: */

  $connectionInfo = array("UID" => "carl@rhtgpa0248", "pwd" => "{your_password_here}", "Database" => "carlswifesdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
  $serverName = "tcp:rhtgpa0248.database.windows.net,1433";
  $conn = sqlsrv_connect($serverName, $connectionInfo);
?>
