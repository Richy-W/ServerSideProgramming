<?php
require_once 'file_util.php';  // the get_file_list function
require_once 'image_util.php'; // the process_image function

$image_dir = 'images';
$image_dir_path = getcwd() . DIRECTORY_SEPARATOR . $image_dir;

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = '';
    }
}

//function to upload multiple files
function uploadFile($name) {
    global $image_dir_path;
    if (isset($_FILES[$name])) {
        $filename = $_FILES[$name]['name'];
        if (empty($filename)) {
            return;
        }
        $source = $_FILES[$name]['tmp_name'];
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        move_uploaded_file($source, $target); 

        //create versions
        process_image($image_dir_path, $filename);
    }
}

switch ($action) {
    case 'upload':        
        uploadFile('file1');
        uploadFile('file2');
        uploadFile('file3');
        
        break;
    case 'delete':
        $filename = filter_input(INPUT_GET, 'filename', 
                FILTER_SANITIZE_STRING);
        $target = $image_dir_path . DIRECTORY_SEPARATOR . $filename;
        if (file_exists($target)) {
            unlink($target);
        }
        break;
}

$files = get_file_list($image_dir_path);
include('uploadform.php');
?>