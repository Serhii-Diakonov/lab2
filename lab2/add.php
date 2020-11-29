<!DOCTYPE html>
<head>
<link rel="stylesheet" href="assets/css/logo.css">
<link rel="stylesheet" href="assets/css/personal.css">
</head>
<html>
<body>
<?php
    require_once 'connection.php';
    $check_query="SELECT email FROM users WHERE email='".$_POST['email']."'";
    $res=mysqli_query ($conn, $check_query);
    $x=mysqli_fetch_array($res);
    if(!$x){
        $email="'".$_POST['email']."'";
        $f_name="'".$_POST['firstname']."'";
        $l_name="'".$_POST['lastname']."'";
        $psw="'".$_POST['password']."'";
        $role="'".$_POST['role']."'";
        $query="INSERT INTO users (first_name, last_name, password, role_id, email) VALUES
         ($f_name, $l_name, $psw, $role, $email)";
        $res1=mysqli_query($conn, $query);
        if($res1){
            header('Location: main.php');
            exit;
        } else echo "<h1>Error</h1>
        <a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
        <div id='logo-text'>Butterfly team</div>
        <h2>An error has happened!<br><a href='registration.php'>Return back</a></h2>";
    } else echo "<h1>Error</h1>
    <a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
    <div id='logo-text'>Butterfly team</div>
    <h2>This email has been already registered!<br><a href='registration.php'>Try another one</a></h2>";
?>
</body>
</html>