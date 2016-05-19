<?php
	$nodes = $_POST['nodes'];
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/nodes.txt", $nodes);
	usleep(2000000);
	header('Location: clusterprogress-storm.php?nodes='.$nodes);	
?>