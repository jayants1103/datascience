<?php
	$time_arr=array();
	$counter=2;
	file_put_contents("/var/www/jproject.ca/docs/Pspark/nodes.txt",$counter);
	do{
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/clusterontime.txt", "\n******************************Loop starts*********************\n", FILE_APPEND);
		for($i=1; $i<101; $i++){
			file_put_contents("/var/www/jproject.ca/docs/Pspark/output.txt", "");
			file_put_contents("/var/www/jproject.ca/docs/Pspark/output2.txt", "");
			$nodes = file_get_contents("/var/www/jproject.ca/docs/Pspark/nodes.txt");
			$start=microtime(true);
			$output = exec("bash cluster-spark");
			do{
				$result=exec("bash pingSparkMaster.sh");
			} while ($result!="complete");
			sleep(2);
			$tot_time=microtime(true) - $start;
			$round=round($tot_time, 4);
			if ( $i%10 == 0){
				file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/clusterontime.txt", $i."- for ".$nodes." nodes time is ".$round."\n", FILE_APPEND);
			}
			$time_arr[$i]=$round;
			$output=exec('ssh -i ~/.ssh/cloud.key ubuntu@worker1 "bash /home/ubuntu/spark-1.5.1/sbin/stop-all.sh"');
			echo "iteration ".$i." for ".$nodes." complete...\n";
			sleep(2);
		
		}
		echo "Loop ends...\n";
		$length = count($time_arr);
		$sum=0;
		for ($x=1; $x<=$length; $x++){
			$sum=$sum+$time_arr[$x];
		}
		echo "\nthe Average time is ".$sum/$length;
		file_put_contents("/var/www/jproject.ca/docs/Pspark/logs/clusterontime.txt","\nthe average time is ".$sum/$length." seconds\n Loop complete",FILE_APPEND);
		++$counter;
		file_put_contents("/var/www/jproject.ca/docs/Pspark/nodes.txt",$counter);
	} while($counter<6);
?>
