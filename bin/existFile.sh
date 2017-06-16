#!/bin/bash

file=$1

status=0
status="$(cat $file | wc -l)"

if [ $status == "0" ];
	then
	echo "doesn't exist">>"./tmp/fileStatus"
else
	echo "exist">>"./tmp/fileStatus"
fi