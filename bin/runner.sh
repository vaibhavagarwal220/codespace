#!/bin/bash

INPUT=$1
USR_EXE=$2

LOCATION_EXE="./tmp/"
LOCATION_INPUT="./input/"

	cat $LOCATION_INPUT$INPUT | $LOCATION_EXE$USR_EXE > $LOCATION_EXE$USR_EXE.output

if [ "$?" -eq "139" ]
	then
		echo 'segmentation fault'
		exit;
	fi

PID_TIMER="$(ps -C timer.sh -o pid=)"
	
if [ -z "$PID_EXE" ]
then
	echo 'e'
else
	kill $PID_TIMER
fi
	