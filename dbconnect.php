<?php
@$db = new mysqli('localhost','project','project','project');

if ($db->connect_error){
	echo "Database is not online"; 
	exit;
	}

if (!$db->select_db ("project"))
	exit("<p>Unable to locate the auth database</p>");
?>
