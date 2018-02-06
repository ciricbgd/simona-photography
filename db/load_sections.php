<?php

require_once'conn.php';
$query = "SELECT * FROM sections;";
$query_result = mysqli_query($conn,$query);

$rows = array();
while($row = mysqli_fetch_assoc($query_result)) {
    $rows[] = $row;
}
echo json_encode($rows);
