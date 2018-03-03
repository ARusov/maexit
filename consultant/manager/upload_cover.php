<?php
    if(isset($_POST['ID']))
    {
        $ID = $_POST['ID'];
        $uploadfile = $_FILES["upload_cover"]["tmp_name"];
        $folder = "../../uploads/".$ID."/";
        if(!is_dir($folder)) {
            mkdir($folder);
        }
        move_uploaded_file($_FILES["upload_cover"]["tmp_name"], $folder.$_FILES["upload_cover"]["name"]);
        echo '{"status": "success", "path": "'.$folder.$_FILES["upload_cover"]["name"].'"}';
        exit();
    }
?>