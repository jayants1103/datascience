#!/bin/bash
source /home/anshuman/devstack/openrc
ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.19 'rm /home/ubuntu/results.txt'
ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.19 "bash /home/ubuntu/hadoop/bin/hadoop fs -get /data/output/part-r-00000 /home/ubuntu/results.txt"
ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.19 "cat /home/ubuntu/results.txt" > /var/www/jproject.ca/docs/hadoop/results.txt
#scp ubuntu@hadoop-master-1:/home/ubuntu/results.txt /var/www/jproject.ca/docs/hadoop/results.txt
sed 'N;s/\n/ /' /var/www/jproject.ca/docs/hadoop/results.txt > /var/www/jproject.ca/docs/hadoop/formathadoopresults.txt
result=`cat /var/www/jproject.ca/docs/hadoop/formathadoopresults.txt`
echo $result