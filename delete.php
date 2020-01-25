<?php
require_once('core/conn.php');
$query = "DELETE FROM `courses` WHERE id = 3";
$result=$link->query($query);
if($result){echo "DELETED";}else{echo $link->error;}

 ?>
