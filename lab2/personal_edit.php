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
        $query="SELECT first_name, last_name, email, photo, role_id, password FROM users
        WHERE id=".$_GET['id'];
        $res = mysqli_query ($conn, $query);
        if($res){
            $user = mysqli_fetch_row($res);
            if(is_array($user)){
                echo "<a href='main.php'><img src='assets/img/logo.png' alt='LOGO' id='logo'></a>
                <div id='logo-text'>Butterfly team</div><span>";
                echo "
                <form enctype='multipart/form-data' method='post' action='update.php'>
                <input type='text' name='firstname' value='".$user[0]."' required placeholder='First name'><br>
                <input type='text' name='lastname' value='".$user[1]."' required plceholder='Last name'><br>";
                if($_SESSION['role']=='Admin') {
                    echo "<select name='role' required>";
                    if($user[4]==1) echo "<option value='1'>Admin</option>
                                    <option value='2'>User</option>";
                    else echo "<option value='2'>User</option>
                                <option value='1'>Admin</option>";
                    echo "</select><br>";
                }
                echo "
                <input type='text' name='email' value='".$user[2]."' required placeholder='Email'><br>
                <input type='text' name='password' value='".$user[5]."' required placeholder='Password' id='password'><br>
                <div id='err1' class='errmsg'></div>
                <input type='file' id='file_load' name='img' accept='image/*'>
                <input type='text' class='hide_text' name='id' value='".$_GET['id']."'>
                <input type='submit' id='load' value='Confirm' class='button'>
                </form>
                <button class='button' id='show'>Cancel</button>
                ";
                echo '</span>';
                if($user['3']!=NULL)echo "<img src='".$user['3']."' alt='User`s avatar' id='ava'>";
                else echo "<span id='no_img'>The user have no avatar</span>";
            } else echo "<a href='main.php'><img src='assets/img/error.png' alt='LOGO' id='logo'></a>
            <div id='logo-text'>Butterfly team</div>
            <h2>Error. Cannot load user information</h2>";
        }
        ?>
        <div id="prompt-form-container">
                <div id="prompt-form">
                    <span id="exit">&#10006</span>
                    <div id="ques">You are going to leave the page. <b>Your changes will not be applied</b>.<br> Are you sure?</div><br>
                    <?php
                        echo "<a href='".$_SERVER['HTTP_REFERER']."'><button class='button' id='yes'>Yes</button></a>";
                    ?>
                </div>
            </div>
        <script src="assets/js/send.js"></script>
        <script src="assets/js/length.js"></script>
        <script src="assets/js/modal.js"></script> 
    </body>
</html>