<?php
	$time_arr[]=array();
	$counter=2;
	do {
		$output=exec("ssh -i ~/.ssh/cloud.key ubuntu@worker1 'bash /home/ubuntu/spark-1.5.1/sbin/stop-all.sh'");
		file_put_contents("/var/www/jproject.ca/docs/Pspark/nodes.txt",$counter);
		echo "\ncreating cluster\n";
		$output=exec("bash cluster-spark");
		do{
         	       $result=exec("bash pingSparkMaster.sh");
                } while ($result!="complete");
		echo "Master ready..sleeping...\n";
                sleep(10);
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/gendercounttime.txt","\n****************************Loop Starts**********************\n",FILE_APPEND);
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/gendercounttime.txt","File size is 140m records\n",FILE_APPEND);
		$nodes=file_get_contents("/var/www/jproject.ca/docs/Pspark/nodes.txt");
		for ($i=1;$i<26;$i++){
			$start=microtime(true);
			$output=exec("bash run-gendercount-spark");
			$tot_time=microtime(true)-$start;
			$output1=exec("bash clearLogsWorker.sh");
			echo "\nOutput is ".$output."... the time is ".$tot_time;
			$round=round($tot_time,4);
			$time_arr[$i]=$round;
		//	if($i%3==0){
				file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/gendercounttime.txt",$i."- the time for ".$nodes." nodes is ".$round." seconds \n",FILE_APPEND);
		//	}
			echo "iteration ".$i." for ".$nodes." nodes complete\n";
		}
		$length=count($time_arr);
		$sum=0;
		for($i=1;$i<$length;$i++){
			$sum=$sum+$time_arr[$i];
		}
		--$length;
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/gendercounttime.txt","Average time on ".$nodes." nodes is".$sum/$length." seconds \n",FILE_APPEND);
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/gendercounttime.txt","\n****************************Loop Complete**********************\n",FILE_APPEND);
		++$counter;
	}while($counter<6);
?>
