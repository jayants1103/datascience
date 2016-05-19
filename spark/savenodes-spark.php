<?php
	$nodes = $_POST['nodes'];
	file_put_contents("/var/www/jproject.ca/docs/spark/nodes.txt", $nodes);
	usleep(2000000);
	header('Location: clusterprogress-spark.php?nodes='.$nodes);
?>