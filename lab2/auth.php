<?php

function check_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email=check_input($_POST['text']);
  $psw=check_input($_POST['password']);
  require_once 'connection.php';
    session_start();
    if (count($_POST)>0) {
        $query= "SELECT u.id, u.first_name, u.last_name, u.email, u.photo, r.title AS role 
        FROM users u
        JOIN roles r ON u.role_id=r.id 
        WHERE email='".$email."' AND password='".$psw."'";
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