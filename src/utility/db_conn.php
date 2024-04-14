<?php
$APP_ROOT = $GLOBALS["APP_ROOT"];
include_once "$APP_ROOT\classes\SQL_Conn.php";

$conn = new DB_Connection();
$conn->create_connection();
if($conn->conn_status == false) {
  echo "Failed: ". $conn->conn_message;
} 

include "sql_query.php";
if ($keepAlive == false)
  $conn->close_connection();
unset($conn);