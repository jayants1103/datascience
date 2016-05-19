<?php
	$counter=2;
	do{
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/nodes.txt",$counter);
	#	$stop_cluster=exec('ssh -i ~/.ssh/cloud.key ubuntu@hadoop-master-1 "sudo bash /home/ubuntu/hadoop-2.7.1/sbin/stop-all.sh"');
		$start_cluster=exec("bash cluster-hadoop");
		$time_file_load=array();
		$time_job_run=array();
		$nodes=file_get_contents("/var/www/jproject.ca/docs/Phadoop/nodes.txt");
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", "\n*******************Loop starts********************\n", FILE_APPEND);
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", "the loop is for ".$nodes." nodes ...140m records\n", FILE_APPEND);
		for($i=1; $i<11; $i++){
		#	file_put_contents("/var/www/jproject.ca/docs/Phadoop/output.txt", "");
		#	file_put_contents("/var/www/jproject.ca/docs/Phadoop/output2.txt", "");
			$start=microtime(true);
			$output = exec("bash run-gendercount-hadoop");
			$time=microtime(true) - $start;
			$round=round($time, 4);
			$time_file_load[$i]=$round;
			if( $i%2==0 ){
				file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", $i."- time for file load is ".$round."\n", FILE_APPEND);
			}
			$start=microtime(true);
			$output = exec("bash start-wordcount");
	                $time=microtime(true) - $start;
	                $round=round($time, 4);
	                $time_job_run[$i]=$round;
			if($i%2==0){
				file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", $i."- time for job run is ".$round."\n", FILE_APPEND);
			}
			echo "Job run ".$i." for ".$nodes." nodes complete...starting next...\n";
			$clear_logs=exec("bash clearLogsHadoop");
		}
		$sum1=0;
		$sum2=0;
		for($i=1; $i<11; $i++){
			$sum1=$sum1 + $time_file_load[$i];
			$sum2=$sum2 + $time_job_run[$i];
		}
		#echo "average time is ".$sum/2;
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", "\nAverage time for file load is ".$sum1/10, FILE_APPEND);
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", "\nAverage time for job run is ".$sum2/10, FILE_APPEND);
		file_put_contents("/var/www/jproject.ca/docs/Phadoop/logs/gendercounttime.txt", "\n********************Loop Complete*********************\n", FILE_APPEND);
		++$counter;
		$stop_cluster=exec('ssh -i ~/.ssh/cloud.key ubuntu@hadoop-master-1 "sudo bash /home/ubuntu/hadoop-2.7.1/sbin/stop-all.sh"');
	} while($counter<6);
?>
