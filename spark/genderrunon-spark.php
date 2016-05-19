<?php
	$output=exec("bash run-gendercount-spark > /var/www/jproject.ca/docs/spark/output.txt &");
	echo "Job has been submitted to the cluster";
	
?>
