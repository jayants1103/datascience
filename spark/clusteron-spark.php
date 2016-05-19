<?php
	file_put_contents("/var/www/jproject.ca/docs/spark/output.txt", "");
	file_put_contents("/var/www/jproject.ca/docs/spark/output2.txt", "");
	$output = exec("bash cluster-spark > /var/www/jproject.ca/docs/spark/output.txt &");
	echo "Initializing..."
?>
