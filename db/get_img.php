<?php

require_once'conn.php';


    $section_id = $_REQUEST['section_id'];
    $query = "SELECT * FROM images AS i INNER JOIN section_images AS si ON i.id = si.image_id WHERE si.section_id=".$section_id." ORDER BY image_id;";
    $query_result = mysqli_query($conn,$query);
    
    $rows = array();
    while($row = mysqli_fetch_assoc($query_result)) {
        $rows[] = $row;
    }
    echo json_encode($rows);
