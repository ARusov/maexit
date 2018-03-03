<?php
    if(isset($_POST['submit_video']))
    {
        $ID = $_POST['ID'];
        $uploadfile = $_FILES["upload_file"]["tmp_name"];
        $folder = "../../uploads/".$ID."/";
        if(!is_dir($folder)) {
            mkdir($folder);
        }
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], $folder.$_FILES["upload_file"]["name"]);
        echo '{"status": "success", "path": "'.$folder.$_FILES["upload_file"]["name"].'"}';
        exit();
    }
?>