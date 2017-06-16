#!/bin/bash

process=$1

	ps -C $process -o pid= > ./tmp/$process.pid