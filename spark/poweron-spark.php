<?php
	#powering the machines
	$opuput=exec("bash poweron-spark > /var/www/jproject.ca/docs/spark/output.txt &");
	echo "Initializing...";
?>
