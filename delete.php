<?php

require('bd_users.php');

$id = $_REQUEST['id'];

$S="DELETE FROM `list` WHERE `list`.`id` = ".$id;

mysqli_query($con, $S);

header('Location: /List/index.php');

?>