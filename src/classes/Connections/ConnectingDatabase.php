<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Connections;

class ConnectingDatabase{
    
   
private $dbpath;

public function __construct() {
    
    $dbpath = $_SERVER['DOCUMENT_ROOT'] . 'openinvoice/database/openinvoice.db';
}


    
    
    //$dbpath = $_SERVER['DOCUMENT_ROOT'] . 'openinvoice/database/openinvoice.db');
            
    public function setDataConnection(){
        
        
    }
    
    public function openConnection(){
        
        //. 'directory/directory/file');
        
    $conn = new SQLite3($dbpath);

    return $conn;
        
    }
    
    public function closingConnection(){
        
        
        
    }
    
    
    
    
    
    
    
    
}