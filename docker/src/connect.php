<?php 
$con = mysql_connect("mysql", "root", "root123");
			if (!$con){
				printf("a root123     ");
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("a8034263_db", $con);
?>
