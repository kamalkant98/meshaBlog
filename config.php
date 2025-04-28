<?php 
    session_start();
    $conn = pg_connect("host=localhost dbname=meshaBlog user=postgres password=0000");
    if (!$conn){
        die("Connection failed: " . pg_last_error());
    }
    
?>