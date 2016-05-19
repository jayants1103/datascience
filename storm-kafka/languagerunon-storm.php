<?php
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/output2.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/storm-kafka/results.txt", "");
	$handle=exec("bash truncate-worker-results.sh");
	$output = exec("bash run-languagegendercount-storm > /var/www/jproject.ca/docs/storm-kafka/output.txt &");
	echo "Storm Topology has been submitted...";
?>
