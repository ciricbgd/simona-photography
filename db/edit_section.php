<?php
require_once '../views/admin_check.php';
require_once'conn.php';

    if(isset($_REQUEST['edit_section'])){
        $section_id = $_REQUEST['section_id'];
        
        if(isset($_REQUEST['unassigned']))
        {
            if($_REQUEST['unassigned']==1){
            $query = "SELECT * FROM images i LEFT JOIN section_images si ON i.id = si.image_id WHERE si.image_id IS NULL";
            }
            else{
                $query = "SELECT * FROM images AS i INNER JOIN section_images AS si ON i.id = si.image_id WHERE si.section_id=".$section_id." ORDER BY image_id;";
            }
        }
        
        
        $query_result = mysqli_query($conn,$query);

        $rows = array();
        while($row = mysqli_fetch_assoc($query_result)) {
            $rows[] = $row;
        }
        echo json_encode($rows);
    }   
    elseif(isset($_REQUEST['section_chb'])){
        $section_id = $_REQUEST['section_id'];
        $featured = $_REQUEST['chb_status'];

        $query = "UPDATE sections SET featured = ".$featured." WHERE id = ".$section_id.";";
        $query_result = mysqli_query($conn,$query);
    }
    elseif(isset($_REQUEST['edit_image']))
    {
        $image_id = $_REQUEST['image_id'];
        $image_name = $_REQUEST['image_name'];
        $image_alt = $_REQUEST['image_alt'];
        $image_description = $_REQUEST['image_description'];
        
        
        $query = "UPDATE images SET name = '".$image_name."', alt = '".$image_alt."', description = '".$image_description."' WHERE id = ".$image_id.";";
        $query_result = mysqli_query($conn,$query);
        
        
        $reset_sections = "DELETE FROM section_images WHERE image_id=".$image_id.";";
        $reset_sections_result = mysqli_query($conn,$reset_sections);
        
        $selected_section = (array) json_decode($_REQUEST['section'], true);
                
                foreach($selected_section as $ss){
                    $query_section = "INSERT INTO section_images VALUES ('', '".$image_id."', '".$ss."')";
                    $section_image = mysqli_query($conn, $query_section);
                }  
    }
    
    elseif(isset($_REQUEST['cb_check'])){
        $ssid = $_REQUEST['ssid'];
        $img_id = $_REQUEST['img_id'];
        
        $query_cb = "SELECT * FROM section_images WHERE image_id=".$img_id." AND section_id=".$ssid.";";
        $query_result = mysqli_query($conn,$query_cb);
        
        if(mysqli_num_rows($query_result))
        {
            echo 'true';
        }
            
    }
