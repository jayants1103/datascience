<?php
		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/spark/output.txt");
		echo $handle;
?>
