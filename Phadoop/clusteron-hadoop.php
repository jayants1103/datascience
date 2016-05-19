<?php
	$time = array();
	file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/clusterontime.txt", "\n******************************Loop starts*********************\n", FILE_APPEND);
	for ($i=1; $i<101; $i++ ){
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/output.txt", "");
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/output2.txt", "");
		$nodes = file_get_contents("/var/www/jproject.ca/docs/Phadoop/nodes.txt");
		$start=microtime(true);
		$output=exec("bash cluster-hadoop > /var/www/jproject.ca/docs/Phadoop/output.txt");
		$tot_time=microtime(true) - $start;
		$round=round($tot_time, 4);
		if ( $i%10 == 0){
			file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/clusterontime.txt", $i."- for ".$nodes." nodes time is ".$round."\n", FILE_APPEND);
		}
		$time[$i]=$round;
		$output=exec('ssh -i ~/.ssh/cloud.key ubuntu@hadoop-master-1 "bash /home/ubuntu/hadoop-2.7.1/sbin/stop-all.sh"');
		echo "iteration ".$i." complete...sleeping now";
	#	sleep(120);
	}
	echo "Loop ends...\n";
	$length = count($time);
	$sum=0;
	for ($x=1; $x<=$length; $x++){
		$sum=$sum+$time[$x];
	}
	echo "\nthe Average time is ".$sum/$length;
	file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/clusterontime.txt","\nthe average time is ".$sum/$length." seconds\n Loop complete",FILE_APPEND);
?>
