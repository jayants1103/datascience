<?php
	$handle=exec("tail /var/www/jproject.ca/docs/Phadoop/output2.txt");
	//exit the ajax calls if the process is complete
	if ( $handle == "complete" )
	{
		echo $handle;

	}
	else
	{	
		$test=exec("bash pingHadoopMaster.sh");
		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/Phadoop/output.txt");
		echo $handle;
	}
?>
