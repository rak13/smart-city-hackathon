<?php
    include_once("DB.php");

    $db = new DB();
    
    $query_name = $_POST["query_name"];
    
    if($query_name === "insertReport"){
        $u_id=$_POST["u_id"];
        $time = $_POST["time"];
        $comment = $_POST["comment"];
        
        $uploadOk = 0;
        $file_tmp =$_FILES["pic"]["tmp_name"];
        $check = getimagesize($_FILES["pic"]["tmp_name"]);
        
        if($check !== false) {
           $uploadOk = 1;
        } else {
           echo "File is not an image.";
           $uploadOk = 0;
        }
        
        if ($_FILES["pic"]["size"] > 5000000) {
           echo "File is too large.";
           $uploadOk = 0;
        }
        else {
          $uploadOk = 1;
        }
        
        if($uploadOk === 1){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($u_id."_".$time.$_FILES['pic']['name']);
            move_uploaded_file($file_tmp, $target_file);
            
            $img_path = 'https://smart-city-rak13.c9users.io/'.$target_file;
                
            $db->insertReport($u_id, $img_path, $comment, $time);
        }
    }
?>