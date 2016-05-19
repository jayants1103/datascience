#/bin/bash

nc -w 1 172.24.42.5 7077
if [ "$?" -eq 0  ]
then
	echo "complete" > /var/www/jproject.ca/docs/spark/output2.txt
fi
