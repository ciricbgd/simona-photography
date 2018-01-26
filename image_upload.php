<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "simona-photography");
    $name = $_FILES['file']['name'];
    $extension = pathinfo($name, PATHINFO_EXTENSION);
    $file_name = rand(1,100000).'.'.$extension;
    
    $dir = "files/";
    $path = $dir.$file_name;
    $upload = move_uploaded_file($_FILES['file']['tmp_name'], $path);
    if (!$upload) { echo "Error uploading file<br>"; }

    $alt = "";
    $description = "";
    $category_id = 0;
    
    $query_upload = "INSERT INTO images VALUES ('', '".$name."', '".$path."', '".$alt."', '".$description."', ".$category_id.");";
    var_dump($path);echo '<br>';
    var_dump($query_upload);echo '<br>';
    var_dump($_GET);
    $query_upload_result = mysqli_query($conn, $query_upload);
?>

    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" multiple>
            <input type="submit" name="submit">
        </form>

    </body>
