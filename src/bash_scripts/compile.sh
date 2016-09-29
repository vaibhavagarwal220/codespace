#!/bin/bash

CC="$1"

SRC="$2"

LOCATION="codes/"

	 $CC $LOCATION$SRC -o tmp/$SRC.out &> tmp/$SRC.err

cat tmp/$SRC.err

