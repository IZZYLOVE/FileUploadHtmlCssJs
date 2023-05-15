<?php
$file_name = $_FILES['file']['name']; // getting the file name
$tmp_name = $_FILES['file']['tmp_name']; // getting temp_name of file
$newFileName = time().$file_name; //changing the file name
    //    echo "<br/>Upload: " . $_FILES["file"]["name"] . "<br />";
    //    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
move_uploaded_file("$tmp_name", "../files/".$newFileName); // moving file to the specified destination, using the new file name
?>

