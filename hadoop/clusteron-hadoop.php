<?php
	file_put_contents("/var/www/jproject.ca/docs/hadoop/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/hadoop/output2.txt", "");
	$output=exec("bash cluster-hadoop > /var/www/jproject.ca/docs/hadoop/output.txt &");
	echo "Initializing...";
?>
