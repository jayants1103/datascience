#!/bin/bash

scp -i /home/anshuman/.ssh/cloud.key ubuntu@172.24.42.17:/home/ubuntu/results.txt /var/www/jproject.ca/docs/storm-kafka/results.txt