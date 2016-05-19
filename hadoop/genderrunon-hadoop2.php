<?php

		$handle=exec("tail -n 1 /var/www/jproject.ca/docs/hadoop/output.txt");
		echo $handle;
?>
