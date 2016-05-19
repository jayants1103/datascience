<?php
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output2.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/portopen.txt", "");
	$output=exec("bash cluster-storm > /var/www/jproject.ca/docs/storm-kafka/output.txt &");
	echo "Initializing...";
?>
