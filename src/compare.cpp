#include <iostream>
#include <stdlib.h>
#include <string>
#include <fstream>
#include <string.h>
#include "error_ret.h"
#include "help_func.h"

using namespace std;

int main(int argc,char *argv[])
{

	string usrOutput,correctOutput;

	switch(argc)
	{
	case 3:
		usrOutput = argv[1];
		correctOutput = argv[2];
	break;
	default:
		cout<<"Wrong Number of Arguments\n";
		exit(EXIT_FAILURE);
	}

	string diffCommand;
	diffCommand = "diff " + usrOutput + " " + correctOutput + " > " + usrOutput + ".status" ;
	system(diffCommand.c_str());

	string status = usrOutput + ".status";
	string temp_string = "all correct";
	fstream writeStatus;
	writeStatus.open(status.c_str(),ios::in);
	writeStatus >> temp_string;
	writeStatus.close();

	writeStatus.open(status.c_str(),ios::out);
	if(temp_string == "all correct")
		writeStatus<<"AC";
	else	
		writeStatus<<"WA";
	writeStatus.close();
	return 0;
}