<?php
/**
 * Entry point to OpenInvoice2000 as main file
 * 
 * @author David Rodríguez <davidjguru@gmail.com>
 * @version 0.7
 */


// In this first block we're going to set initial charges
// as the class-procesing tool (the autoloader), 
// the language to set or the first database connection


// Autoloader
require_once("src/classes/Autoloader.php");

// Opening session
session_start();

// Creating a new connection to the database
$conn = new SQLite3('database/openinvoice.db');
$message="";

// First, we're going to look for the login value
if(!empty($_POST["login"])) {

        $sql = 'SELECT * FROM users WHERE user = ? and password = ?';
        $query = $conn->prepare($sql);
        $query->bindParam('1', $_POST["user_name"]);
        $query->bindParam('2', $_POST["password"]);
        
        $response = $query->execute();
        $row = $response->fetchArray();
        
	if(is_array($row)) {
	$_SESSION["user_id"] = $row['userid'];
        $_SESSION["user"] = $row['user'];
	} else {
	$message = LOGINERROR;
	}
}

// And now asking about the logout value
if(!empty($_POST["logout"])) {
        
        // If we're going out, we have to clear the session
          $_SESSION= array();// Cleaning the session variable
          session_unset();// Undefining the session variable
          session_destroy();// And destroy the session
}

// Asking about language
if (isset($_POST["language"])){
    
    $_SESSION["language"] = $_POST["language"];
    $language = $_SESSION["language"];
    include ("i18n/$language.php");
}

elseif (isset ($_SESSION["language"])) {
    
    $language = $_SESSION["language"];
    include ("i18n/$language.php");
    
    
} else{
    
    // Here we can asign an idiom by default
    // example:
    // include ("i18n/spanish.php");
    
    // Or ask to the browser about the language
    // and set the default, changing also
    // the value of the language variable session
    // within $_SESSION
    
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang){
        
        case "en":
            include ("i18n/english.php");
             $_SESSION["language"] = "english";
            break;
        case "es":
            include ("i18n/spanish.php");
             $_SESSION["language"] = "spanish";
            break;
        default:
            include ("i18n/spanish.php");
            $_SESSION["language"] = "spanish";
            break;
    }
    
}





?>
<html>
<head>
    <head>
        <meta charset="UTF-8">
        <title>OpenInvoice 2000</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
</head>
<body>
<div>
<div style="display:block;margin:0px auto;">
    
<?php if(empty($_SESSION["user_id"])) { ?>
    <form action="index.php" method="post" id="frmLogin">
        <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
        <div class="lang-message"><?php echo LANGMESSAGE; ?></div>
	<div class="field-group">
		<div id="user"><label for="login"><?php echo USER;?></label></div>
		<div><input name="user_name" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div id="password"><label for="password"><?php echo PASSWORD;?></label></div>
		<div><input name="password" type="password" class="input-field"> </div>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"> </span></div>
	</div>       
</form>
<?php 
} else { 
?>
<form action="index.php" method="post" id="frmLogout">
<div class="member-dashboard"> 
    <?php echo WELCOME. ucwords($_SESSION['user']); ?><br>
    <?php echo LOGIN; ?><br><br>
    <?php echo LOGOUT; ?><input type="submit" name="logout" value="<?php echo OUT;  ?>" class="logout-button">.

</div>
</form>
    
<div id="idioma">
<form name="i18nselector" method="post" action="index.php">
        
    <fieldset>
            <legend><?php echo LEGEND; ?></legend>
            <select name="language">
                <option value="<?php echo LANGVALUE1; ?>"><?php echo LANG1; ?></option>
                <option value="<?php echo LANGVALUE2; ?>"><?php echo LANG2; ?></option>
            </select>
            <input type="submit" value="<?php echo SELECTI18N; ?>" >
    </fieldset>
        
        
</form>
    
    <h1><?php echo ACTIONSMENU; ?></h1>
    
    <form action="action1.php" method="post" id="actionsmenu">
        <div class="field-group">
                <div><button type="submit" form="actionsmenu" name="unit" value="Unit"><?php echo ACTION1; ?></button></div>
	</div>   
	<div class="field-group">
                <div><button type="submit" form="actionsmenu" name="invoice" value="Invoice"><?php echo ACTION2; ?></button></div>

	</div>   
        <div class="field-group">
                <div><button type="submit" form="actionsmenu" name="client" value="Client"><?php echo ACTION3; ?></button></div>

	</div>   
	<div class="field-group">
                <div><button type="submit" form="actionsmenu" name="user" value="User"><?php echo ACTION4; ?></button></div>

	</div>       
    </form>
    
</div>
</div>
<?php } ?>
</body></html>
