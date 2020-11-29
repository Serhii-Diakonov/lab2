<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="assets/css/button.css">
    <link rel="stylesheet" href="assets/css/logo.css">
    <link rel="stylesheet" href="assets/css/reg_form.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="stylesheet" href="assets/css/personal.css">
</head>
<html>
    <body>
        <h1>Personal page</h1>
        <?php
        require_once 'connection.php';
        $query="SELECT u.first_name, u.last_name, u.email, u.photo, r.title AS role
        FROM users u
        JOIN roles r ON u.role_id=r.id 
        WHERE u.id='".$_GET['id']."'";
        $res = mysqli_query ($conn, $query);
        $user = mysqli_fetch_array($res);
        if(is_array($user)){
            echo "
            <a href='main.php'><img src='assets/img/logo.png' alt='LOGO' id='logo'></a>
            <div id='logo-text'>Butterfly team</div>
            ";
            echo '<span>
            <p>'.$user['first_name'].'</p>
            <p>'.$user['last_name'].'</p>
            <p>'.$user['role'].'</p>
            <p>'.$user['email'].'</p>
            </span>';
            if($user['photo']!=NULL)echo "<img src='".$user['photo']."' alt='User`s avatar' id='ava'>";
            else echo "<span id='no_img'>The user have no avatar</span>";
        } else echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
            <div id='logo-text'>Butterfly team</div>
            <h2>Error. Cannot load user information</h2>";
        if($_SESSION['auth']&&$_GET['id']==$_SESSION['id']||$_SESSION['role']=="Admin"){
            echo "
            <form method='get' action='personal_edit.php'>
            <input type='text' class='hide_text' name='id' value='".$_GET['id']."'>
            <input type='submit' value='Edit' class='button' id='edit'>
            </form>
            <input type='submit' value='Delete' class='button' id='show'>
            ";
        }
        ?>
        <div id="prompt-form-container">
                <div id="prompt-form">
                    <span id="exit">&#10006</span>
                    <div id="ques">You are going to <b>delete this account</b>.<br> Are you sure?</div><br>
                    <?php
                        echo "<button class='button' id='yes' onclick='send(".$_GET['id'].",\"del.php\")'>Yes</button>";
                    ?>
                </div>
            </div>
        <script src="assets/js/send.js"></script>
        <script src="assets/js/modal.js"></script> 
    </body>
</html>