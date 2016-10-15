#!/bin/bash

TIME_LIMIT=$1
SIZE_LIMIT=$2
INPUT_FILE=$3
USR_EXE=$4
SRC_CODE=${USR_EXE: 0:(-4)}

RUN_TIMER="./bin/Timer.out"

	$RUN_TIMER $1 $2 $4 

	cat "./input/$INPUT_FILE" | "./tmp/$USR_EXE" > "./tmp/$USR_EXE.output"

if [ "$?" == "139" ]
then
	echo "RE" > "./tmp/$SRC_CODE.status"
fi

PID_TIMER="$(ps -C timer.sh -o pid=)"
if [ "$PID_TIMER" ] 
then
	kill $PID_TIMER
fi