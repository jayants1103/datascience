#!/bin/bash

ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.5 "sudo rm /home/ubuntu/spark-1.5.1/logs/spark*"
ssh -i ~/.ssh/cloud.key ubuntu@172.24.42.6 "sudo rm /home/ubuntu/spark-1.5.1/logs/spark*"
