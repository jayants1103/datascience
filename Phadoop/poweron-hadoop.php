<?php
	for ($i=0; $i<2; $i++ ){
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/output.txt", "");
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/output2.txt", "");
		$start=microtime(true);
		$opuput=exec("bash poweron-hadoop > /var/www/jproject.ca/docs/hadoop/output.txt");
		$tot_time=microtime(true) - $start;
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/powerontime.txt", "\n".$tot_time."\n", FILE_APPEND);
		echo "data appended";
		$output=exec("ssh -i ~/.ssh/cloud.key ubuntu@hadoop-master-1 'bash /home/ubuntu/hadoop-2.7.1/sbin/stop-all.sh'");
		echo "sleeping now";
		sleep(600);
	}
	echo "Initializing...";
?>
