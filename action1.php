<?php

// Opening session
session_start();

 $language = $_SESSION["language"];
 include ("i18n/$language.php");

?>
<html>
<head>
        <meta charset="UTF-8">
        <title>OpenInvoice 2000</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css"/>
</head>
<body>
 <form action="processingUnits.php" method="post" id="frmBusinessUnit">
        <legend><?php echo WELCOMEBUSINNESSUNIT; ?></legend>
	<div class="field-group">
		<div id="firstnameUnit"><label for="firstnameUnit"><?php echo FIRSTNAMEUNIT;?></label></div>
		<div><input name="firstnameUnit" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div id="lastnameUnit"><label for="lastnameUnit"><?php echo LASTNAMEUNIT;?></label></div>
		<div><input name="lastnameUnit" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="fiscalnumberUnit"><label for="fiscalnumberUnit"><?php echo FISCALNUMBERUNIT;?></label></div>
		<div><input name="fiscalnumberUnit" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="adressUnit"><label for="adressUnit"><?php echo ADRESSUNIT;?></label></div>
		<div><input name="adressUnit" type="text" class="input-field"> </div>
	</div>
        
	<div class="field-group">
		<div><input type="submit" name="login" value="Create" class="form-submit-button"></span></div>
	</div>       
</form>



</body>
</html>

