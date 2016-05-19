<?php
	$nodes = $_POST['nodes'];
	file_put_contents("/var/www/jproject.ca/docs/Phadoop/nodes.txt", $nodes);
	usleep(2000000);
	header('Location: clusterprogress-hadoop.php?nodes='.$nodes);	
?>