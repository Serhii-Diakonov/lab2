<!DOCTYPE html>
<head>
<link rel="stylesheet" href="assets/css/reg_form.css">
<link rel="stylesheet" href="assets/css/logo.css">
</head>
<html>
    <body>
    <h1>Registration form</h1>
    <a href="main.php"><img src="assets/img/logo.png" alt="LOGO" id="logo"></a>
        <div id="logo-text">Butterfly team</div>
    <form method="post" action="add.php">
    <input name="firstname" type="text" placeholder="First name" required><br>
    <input name="lastname" type="text" placeholder="Last name" required><br>
    <input name="email" type="text" placeholder="Email" required><br>
    <select name="role" required>
        <option value="2">User</option>
        <option value="1">Admin</option>
    </select><br>
    <input name="password" type="password" id="psw_1" placeholder="Password" required><br>
    <div id="err1" class="errmsg"></div>
    <input name="conf_password" type="password" id="psw_2" placeholder="Repeat password" required><br>
    <div id="err2" class="errmsg"></div>
    <input type="submit" id="button" disabled>
    <script src="assets/js/check_psw.js"></script>
    </form> 
   </body>
</html>