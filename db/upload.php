<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "simona-photography");
header('Content-type:application/json;charset=utf-8');

try {
    if (
        !isset($_FILES['file']['error']) ||
        is_array($_FILES['file']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }

    switch ($_FILES['file']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }

    $filepath = sprintf('files/%s_%s', uniqid(), $_FILES['file']['name']);

    if (!move_uploaded_file(
        $_FILES['file']['tmp_name'],
        $filepath
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }
    else{
            $name = "";
            $path = $filepath;
            $alt = "";
            $description = "";
            $category_id = 0;
            $query_upload = "INSERT INTO images VALUES ('', '".$name."', '".$path."', '".$alt."', '".$description."', ".$category_id.");";
            $query_upload_result = mysqli_query($conn, $query_upload);
    }
