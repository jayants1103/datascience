<?php
	$handle=exec("bash fetchResults.sh");
	$handle=exec("tail -n 1 /var/www/jproject.ca/docs/storm-kafka/results.txt");	
	if (empty($handle)){
		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/storm-kafka/output.txt");	
	}
		echo $handle;
	
?>
