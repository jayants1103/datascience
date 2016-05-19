#/bin/bash

nc -w 1 172.24.42.19 8088
if [ "$?" -eq 0  ]
then
	echo "complete" > /var/www/jproject.ca/docs/Phadoop/output2.txt
fi
