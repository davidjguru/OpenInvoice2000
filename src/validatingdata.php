<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
print("The fields you're trying to set are:");
print("The invoice id is:");
print($_POST["id"]);
print("The client name is:");
print($_POST["clientname"]);
print("The client fiscal code is:");
print($_POST["clientNIF"]);
print("The client Adress is:");
print($_POST["clientAdress"]);
print("The date for the invoice is:");
print($_POST["date"]);

echo 'Loading';

try {
  
    
  $id = $_POST["id"];
  $name = $_POST["clientname"];
  $CIF = $_POST["clientNIF"];
  $direccion = $_POST["clientAdress"];
  $fecha = $_POST["date"];
  
    
    $base = new SQLite3('database/openinvoice.db');    
    $sql = 'INSERT INTO invoice (id, clientname, clientNIF, clientAdress, date) VALUES (?,?,?,?,?)';
    $consulta = $base->prepare($sql);
   
    
    $consulta->bindParam('1', $id);
    $consulta->bindParam('2', $name);
    $consulta->bindParam('3', $CIF);
    $consulta->bindParam('4', $direccion);
    $consulta->bindParam('5', $fecha);
    
    $consulta->execute();
    
    $base->close();
    
    
 } catch (Exception $e) {
     
  die("Unable to connect: " . $e->getMessage());
} catch (PDOException $e){
  echo $e->getMessage();  
}


print("The previous fields were saved in database. Click the next button to return to First page");
echo'<form action="index.php" method="post"> <input type="submit" value="Back"> </form>';