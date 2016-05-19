<?php
	$handle=exec("tail /var/www/jproject.ca/docs/spark/output2.txt");
	//exit the ajax calls if the process is complete
	if ( $handle == "complete" )
	{
		echo $handle;
	}
	else
	{	
		$test=exec("bash pingSparkMaster.sh");
		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/spark/output.txt");
		echo $handle;
	}
?>
