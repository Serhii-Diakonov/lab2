<?php

    require_once 'connection.php';
    session_start();
    if (count($_POST)>0) {
        $query= "SELECT u.id, u.first_name, u.last_name, u.email, u.photo, r.title AS role 
        FROM users u
        JOIN roles r ON u.role_id=r.id 
        WHERE email='".$_POST['text']."' AND password='".$_POST['password']."'";
        $res = mysqli_query ($conn, $query);
        $row = mysqli_fetch_array($res);
        if (is_array($row)){
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname']=$row['first_name'];
            $_SESSION['lastname']=$row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['auth']=true;
            $_SESSION['role']=$row['role'];
            if($row['photo']!=NULL)$_SESSION['photo']=$row['photo'];
            else $_SESSION['photo']=NULL;
        }
        else $_SESSION["auth"]=false;
        header('Location: main.php');
    }
    exit;
?>