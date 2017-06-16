#!/bin/bash

inputFile=$1
usrexe=$2

seg="$(cat $inputFile | ./tmp/$usrexe > ./tmp/$usrexe.output)"
echo $? > ./tmp/$usrexe.status