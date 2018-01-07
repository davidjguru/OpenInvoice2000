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
    
    <?php 
    require 'fpdf.php';
    
    if(!empty($_POST["unit"])) { ?>
    <form action="processingUnits.php" method="post" id="frmBusinessUnit">
        <h2><?php echo WELCOMEBUSINNESSUNIT; ?></h2>
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
		<div><input type="submit" name="businessunit" value="<?php echo CREATEUNIT; ?>" class="form-submit-button"></span></div>
	</div>       
</form>
    
    
    <?php
    
    }elseif (!empty ($_POST["invoice"])) {
        
        echo "Create new Invoice";
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(40,10,'Hola, Mundo!');
        // We have to clean the buffer
        ob_get_clean();
        $pdf->Output();
        
    }elseif (!empty ($_POST["client"])){?>
    
         <form action="processingUnits.php" method="post" id="frmClient">
        <legend><?php echo WELCOMECLIENTS; ?></legend>
	<div class="field-group">
		<div id="firstnameUnit"><label for="firstnameClient"><?php echo FIRSTNAMECLIENT;?></label></div>
		<div><input name="firstnameClient" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div id="lastnameUnit"><label for="lastnameUnit"><?php echo LASTNAMECLIENT;?></label></div>
		<div><input name="lastnameClient" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="fiscalnumberUnit"><label for="fiscalnumberClient"><?php echo FISCALNUMBERCLIENT;?></label></div>
		<div><input name="fiscalnumberClient" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="adressUnit"><label for="adressClient"><?php echo ADRESSCLIENT;?></label></div>
		<div><input name="adressUnit" type="text" class="input-field"> </div>
	</div>
        
	<div class="field-group">
		<div><input type="submit" name="newclient" value="<?php echo CREATECLIENT; ?>" class="form-submit-button"></span></div>
	</div>  
        
</form>
           
        
   <?php 
   
    }elseif (!empty ($_POST["user"])) { 
        
    
?>
    
     <form action="processingUnits.php" method="post" id="frmUser">
        <legend><?php echo WELCOMEUSER; ?></legend>
	<div class="field-group">
		<div id="firstnameUnit"><label for="firstnameUser"><?php echo FIRSTNAMEUSER;?></label></div>
		<div><input name="firstnameUser" type="text" class="input-field"></div>
	</div>
	<div class="field-group">
		<div id="lastnameUser"><label for="lastnameUser"><?php echo LASTNAMEUSER;?></label></div>
		<div><input name="lastnameUser" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="nickuser"><label for="nickUser"><?php echo NICKUSER;?></label></div>
		<div><input name="nickUser" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="passworduser"><label for="nickUser"><?php echo PASSWORDUSER;?></label></div>
		<div><input name="passwordUser" type="text" class="input-field"> </div>
	</div>
        <div class="field-group">
		<div id="leveluser"><label for="levelUser"><?php echo LEVELUSER;?></label></div>
                <select name="levelUser">
                <option value="1"><?php echo LEVELUSER1; ?></option>
                <option value="2"><?php echo LEVELUSER2; ?></option>
                <option value="3"><?php echo LEVELUSER3; ?></option>
                <option value="4"><?php echo LEVELUSER4; ?></option>
                </select></div>
	</div>
        
	<div class="field-group">
		<div><input type="submit" name="newuser" value="<?php echo CREATEUSER; ?>" class="form-submit-button"></span></div>
	</div>       
</form>
        
    <?php 
    }
   ?>
    
    
   

 



</body>
</html>

