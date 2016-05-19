<?php
	$handle=exec("tail /var/www/jproject.ca/docs/Phadoop/output2.txt");
	if ( $handle == "complete" )
	{
		echo $handle;
	}
	else
	{	
		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/Phadoop/output.txt");
		echo $handle;
	}
?>
