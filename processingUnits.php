<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

 $language = $_SESSION["language"];
 include ("i18n/$language.php");
 
 $name="";
 $lastname="";
 $fiscal="";
 $adress="";
 

if (isset($_POST["firstnameUnit"],$_POST["lastnameUnit"],$_POST["fiscalnumberUnit"],$_POST["adressUnit"] ) 
    and $_POST["firstnameUnit"]!="" and $_POST["lastnameUnit"]!="" and $_POST["fiscalnumberUnit"]!="" 
    and $_POST["adressUnit"]!=""){
    
    $name=$_POST["firstnameUnit"];
 $lastname=$_POST["lastnameUnit"];
 $fiscal=$_POST["fiscalnumberUnit"];
 $adress=$_POST["adressUnit"];
 
    echo "Accediendo a la conexión, datos cargados vía POST y no en blanco";
    echo $name;
    echo $adress;

    
    // Opening a new connection to the database
    $conn = new SQLite3('database/openinvoice.db');
    
    // Prepare INSERT statement to SQLite3 file db
    $insert = "INSERT INTO units (first_name, last_name, fiscal_number, adress) VALUES (:firstname, :lastname, :fiscalnumber, :adress)";
    $statement = $conn->prepare($insert);
    
    // Bind parameters to statement variables
    $statement->bindValue(':firstname', $name);
      $statement->bindValue(':lastname', $lastname);
        $statement->bindValue(':fiscalnumber', $fiscal);
          $statement->bindValue(':adress', $adress);
          
          // Insert data
    $statement->execute();
            
     /*       
    $query = $conn->prepare($sql);
        $query->bindParam('1', $_POST["firstnameUnit"]);
        $query->bindParam('2', $_POST["lastnameUnit"]);
        $query->bindParam('3', $_POST["fiscalnumberUnit"]);
        $query->bindParam('4', $_POST["adressUnit"]);
        $response = $query->execute();
        //$row = $response->fetchArray();
*/
    
}

else{
    echo EMPTYFORM; 
    echo '<a href="action1.php">'; 
    echo INVITEFORM; 
    echo '</a>';
    
    
}