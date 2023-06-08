<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `event_tbl` WHERE event_id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: admin_index.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}
