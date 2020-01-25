<?php
require_once('core/conn.php');
$query = "CREATE DATABASE loto_brojevi";
if($link->query($query)===TRUE){echo "table ready";}else{echo $link->error;}
 ?>
