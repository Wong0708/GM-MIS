<?php
$dbc=mysqli_connect('localhost','root','','gm_db');


if (!$dbc) {
 die('Could not connect: '.mysql_error());
}

?>