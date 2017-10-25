<?php
// First, we're going to call the autoloader
require_once("src/classes/Autoloader.php");
session_start();

$conn = new SQLite3('database/openinvoice.db');
$message="";

if(!empty($_POST["login"])) {

        $sql = 'SELECT * FROM users WHERE user = ? and password = ?';
        $query = $conn->prepare($sql);
        $query->bindParam('1', $_POST["user_name"]);
        $query->bindParam('2', $_POST["password"]);
        
        $response = $query->execute();
        $row = $response->fetchArray();
        //$result = mysqli_query($conn,"SELECT * FROM users WHERE user = ? and password = ?';
	//$row  = mysqli_fetch_array($result);
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['userid'];
        $_SESSION["user"] = $row['user'];
	} else {
	$message = "Invalid Username or Password!";
	}
}
if(!empty($_POST["logout"])) {
	$_SESSION["user_id"] = "";
	session_destroy();
}
?>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
</head>
<body>
<div>
<div style="display:block;margin:0px auto;">
<?php if(empty($_SESSION["user_id"])) { ?>
    <form action="index.php" method="post" id="frmLogin">
	<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
	<div class="field-group">
		<div><label for="login">Username</label></div>
		<div><input name="user_name" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>       
</form>
<?php 
} else { 
//$result = mysqlI_query($conn,"SELECT * FROM users WHERE userid='" . $_SESSION["user_id"] . "'");
//$row  = mysqli_fetch_array($result);
?>
<form action="" method="post" id="frmLogout">
<div class="member-dashboard">Welcome <?php echo ucwords($_SESSION['user']); ?> with ID <?php echo $_SESSION["user_id"];?>. Your root is <?php echo $_SERVER['DOCUMENT_ROOT'];?> And You have successfully logged in!<br>
Click to <input type="submit" name="logout" value="Logout" class="logout-button">.</div>
</form>
</div>
</div>
<?php } ?>
</body></html>
