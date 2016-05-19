<?php
	$output=exec("bash run-genderlanguagecount-spark > /var/www/jproject.ca/docs/spark/output.txt &");
	echo "Job has been submitted to the cluster";
	
?>
