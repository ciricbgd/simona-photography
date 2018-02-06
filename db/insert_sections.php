<?php
require_once '../views/admin_check.php';
require_once'conn.php';

if(isset($_REQUEST['insert']))
{
    $name = $_REQUEST['name'];
    $featured = $_REQUEST['featured'];
    $query = "INSERT INTO sections (name, featured) VALUES ('".$name."', ".$featured.");";
    $query_result = mysqli_query($conn,$query); 
}
elseif(isset($_REQUEST['delete']))
{
    $id = $_REQUEST['id'];
    $query = "DELETE FROM sections WHERE id=".$id.";";
    $query_result = mysqli_query($conn,$query); 
    
    $remove_connection = "DELETE FROM section_images WHERE id=".$id.";";
    $result_remove_connection = mysqli_query($conn,$remove_connection); 
}
