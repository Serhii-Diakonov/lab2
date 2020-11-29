<?php
    session_start();
    require_once 'connection.php';

    if($_FILES['img']['name']!=NULL){
    $dir="public/images/";
    $target_file=$dir.basename($_FILES['img']['name']);
    $uploadOk=1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            echo "The file ". basename($_FILES["img"]["name"]). " has been uploaded.";
            $path="'".$dir.basename($_FILES["img"]["name"])."'";
            $query="UPDATE users  SET photo=".$path." WHERE id=".$_POST['id'];
            $res=mysqli_query($conn, $query);
            if(!$res) echo "Sorry, there was an error uploading your file.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    }
    $email="'".$_POST['email']."'";
    $f_name="'".$_POST['firstname']."'";
    $l_name="'".$_POST['lastname']."'";
    $psw="'".$_POST['password']."'";
    $role="'".$_POST['role']."'";
    $query="UPDATE users SET first_name=".$f_name.", last_name=".$l_name.", email=".$email.", password=".$psw.", role_id=".$role."WHERE id=".$_POST['id'];
    $res=mysqli_query($conn, $query);
    if(!$res) echo "Sorry, there was an error updating info.";
    else {
        header('Location: main.php');
        exit; 
    }
?>