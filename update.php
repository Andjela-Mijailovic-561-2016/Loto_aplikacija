<?php
require_once('core/conn.php');
$query = "UPDATE `courses` SET `title` = 'NEW TITLE', `lessons` = 100 WHERE id = 3";
$result=$link->query($query);
if($result){echo "UPDATED";}else{echo $link->error;}
 ?>
