<?php
  /*
  Server: rhtgpa0248.database.windows.net,1433
  SQL Database: carlswifesdb
  User Name: carl

  PHP Data Objects(PDO) Sample Code:
  */
  class db_connect {
    public $conn = NULL;

    function __construct() {
      try {
         $this->conn = new PDO ( "sqlsrv:server = tcp:rhtgpa0248.database.windows.net,1433; Database = carlswifesdb", "carl", "{your_password_here}");
         $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      }
      catch ( PDOException $e ) {
         print( "Error connecting to SQL Server." );
         die(print_r($e));
      }

      // SQL Server Extension Sample Code:

      $connectionInfo = array("UID" => "carl@rhtgpa0248", "pwd" => "{your_password_here}", "Database" => "carlswifesdb", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
      $serverName = "tcp:rhtgpa0248.database.windows.net,1433";
      $this->conn = sqlsrv_connect($serverName, $connectionInfo);
    }

    function __destruct() {
      sqlsrv_close($this->conn);
    }

    function fetch_rows($stmt = "") {
      $res = NULL;
      $obj = NULL;
      $rows = NULL;

      // Trying to perpare the statement
      try {
        $stmt = sqlsrv_prepare($this->conn $statement);
      } catch ( PDOException $e ) {
        print( "Error preparing the statement." );
        die(print_r($e));
      }

      // Die if the statement was shit
      if(!$stmt) {
        die( print_r( "Nothing to query", true ) );
      } else {
        $res = sqlsrv_query($stmt);
      }

      // Die if the execution was not succesfull
      if( $res === false ) {
        die( print_r( sqlsrv_errors(), true ) );
      } else {
        $rows = array();
        while( $obj = sqlsrv_fetch_object( $res ) ) {
          $rows[] = $obj;
        }
      }

      // Return the array of objects queried
      if( $rows !== NULL ) {
        return $rows;
      } else {
        return false;
      }

    }
  }
?>
