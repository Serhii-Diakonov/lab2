<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/logo.css">
</head>
<html>
    <body>
<?php
    session_start();
    require_once 'connection.php';

    if($_FILES['img']['name']!=NULL){
    $dir="public/images/";
    $target_file=$dir.basename($_FILES['img']['name']);
    $uploadOk=1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (file_exists($target_file)) {
        echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
        <div id='logo-text'>Butterfly team</div>
        <h2>Sorry, file already exists.</h2>";
        $uploadOk = 0;
    }
    
    if ($uploadOk == 0) {
        echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
        <div id='logo-text'>Butterfly team</div>
        <h2>Sorry, your file was not uploaded.</h2>";
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $path="'".$dir.basename($_FILES["img"]["name"])."'";
            $query="UPDATE users  SET photo=".$path." WHERE id=".$_POST['id'];
            $res=mysqli_query($conn, $query);
            if(!$res) echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
            <div id='logo-text'>Butterfly team</div>
            <h2>Sorry, there was an error uploading your file.</h2>";
        } else {
            echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
            <div id='logo-text'>Butterfly team</div>
            <h2>Sorry, there was an error uploading your file.</h2>";
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
    if(!$res) echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
    <div id='logo-text'>Butterfly team</div>
    <h2>Sorry, there was an error updating info.</h2>";
    else {
        header('Location: main.php');
        exit; 
    }
?>