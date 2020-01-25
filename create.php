<?php
require_once('core/conn.php');
$query = "CREATE TABLE `registration`.`loto_sedmica` ( `id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
`drawn` INT NOT NULL ,
`kolo` INT NOT NULL ,
 PRIMARY KEY (`id`)) ENGINE = InnoDB;";
$result = $link->query($query);
if($result){echo 'added';}else{echo $link->error;}
 ?>
