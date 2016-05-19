<?php
	file_put_contents("/var/www/jproject.ca/docs/hadoop/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/hadoop/output2.txt", "");
	$output = exec("bash run-genderlanguagecount-hadoop > /var/www/jproject.ca/docs/hadoop/output.txt &");
	echo "Job has been submitted to the cluster";
?>
