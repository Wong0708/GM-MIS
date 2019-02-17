<?php
<<<<<<< Updated upstream
$dbc=mysqli_connect('127.0.0.1','root','1234','globemasterdb');
=======
$dbc=mysqli_connect('127.0.0.1','root','1234','mydb');
>>>>>>> Stashed changes

if (!$dbc) {
 die('Could not connect: '.mysql_error());
}

?>