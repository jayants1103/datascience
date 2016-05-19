<?php
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output2.txt", "");
	$opuput=exec("bash poweron-storm > /var/www/jproject.ca/docs/storm-kafka/output.txt &");
	echo "Initializing...";
?>
