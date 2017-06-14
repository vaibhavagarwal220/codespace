#!/bin/bash

compiler=$1
code=$2

if [ "$compiler" == "gcc" ];
	then
	$compiler ./adminaccess/codes/$code -o ./tmp/$code.out &> ./tmp/$code.err
fi

if [ "$compiler" == "g++" ];
	then 
	$compiler ./adminaccess/codes/$code -o ./tmp/$code.out &> ./tmp/$code.err
fi