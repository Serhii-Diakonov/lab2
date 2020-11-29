<?php
    session_start();
    require_once 'connection.php';
    $query="DELETE FROM users WHERE id=".$_GET['id'];
    mysqli_query($conn, $query);
    if($_SESSION['id']==$_GET['id'])header('Location: sign_out.php');
    else header('Location: main.php');
    exit;
?>