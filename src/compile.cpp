#include <iostream>
#include "help_func.h"
#include <stdlib.h>
#include <fstream>

using namespace std;

int main(int argc,char *argv[])
{
	string sourceCode,compiler;

	switch(argc)
	{
	case 3:
		sourceCode = argv[2];
		compiler = argv[1];
	break;
	default:
		cout<<"Wrong Number of Arguments\n";
		exit(EXIT_FAILURE);
	}

	string compileCommand;
	compileCommand = "./bin/compile.sh " + compiler + " " + sourceCode;
	system(compileCommand.c_str());

	string errorFileName;
	errorFileName = "./tmp/" + sourceCode + ".err";

	ofstream status;
	string statusFile;
	statusFile = "./tmp/" + sourceCode + ".status";
	status.open(statusFile.c_str());
	if(!existFile(errorFileName))
	{
		status << "SC";
	}
	else
	{
		status << "CE";
	}
	status.close();

	return 0;
}