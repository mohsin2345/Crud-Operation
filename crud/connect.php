<?php


// Create connection
$con = new mysqli('localhost', 'root', '', 'crudoperation');

// Check connection
if(!$con){
    die(mysqli_error($con));
}

?>
