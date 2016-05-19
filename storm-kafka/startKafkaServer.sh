#/bin/bash

ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.20 "bash /home/ubuntu/kafka/bin/kafka-server-start.sh /home/ubuntu/kafka/config/server.properties"
