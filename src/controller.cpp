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
	
	string compiler,timeLimit,code,inputFile,outputFile,sourceCode;
	
	switch(argc)
	{
	case 6:
		if(strcmp(argv[1],"C++") == 0)
		{
			compiler = "g++";
		}
		else if(strcmp(argv[1],"C") == 0)
		{
			compiler = "gcc";
		}
		else if(strcmp(argv[1],"java") == 0)
		{
			compiler = "javac";
		}
		else
		{
			cout<<"Wrong compiler\n";
			exit(EXIT_FAILURE);
		}
		timeLimit = argv[2];
		if(!isnumber(timeLimit))
		{
			cout<<"Time limit should be a number\n";
			exit(EXIT_FAILURE);
		}
		code = argv[3];
		inputFile = argv[4];
		outputFile = argv[5];
	break;
	default:	
		cout<<"Wrong Number of Arguments\n";
		exit(EXIT_FAILURE);
	}

	/*cout<<"Compiler : "<<compiler<<endl;
	cout<<"TimeLimit : "<<timeLimit<<endl;
	cout<<"Input File : "<<inputFile<<endl;
	cout<<"Output File : "<<outputFile<<endl;*/
	/*if(!existFile(code))
	{
		cout<<"Code file doesnt exist\n";
		exit(EXIT_FAILURE);
	}
	if(!existFile(inputFile))
	{
		cout<<"Input file doesnt exist\n";
		exit(EXIT_FAILURE);
	}
	if(!existFile(outputFile))
	{
		cout<<"output file doesnt exist\n";
		exit(EXIT_FAILURE);
	}*/

	string compile;
	sourceCode = extractFile(code);
	compile = "./bin/Compile.EXE " + compiler + " " + sourceCode;
	system(compile.c_str());

	string statusFilename,temp_string;
	statusFilename = "./tmp/" + sourceCode + ".status";
	ifstream status;
	status.open(statusFilename.c_str());

	status >> temp_string;
	status.close();
	if(temp_string == "CE")
	{
		cout<<"Compilation Error\n";
		return compilationError;
	}

	string runner;
	runner = "./bin/Runner.EXE " + sourceCode + " " + inputFile + " " + timeLimit;
	system(runner.c_str());

	int pid = getPID("Runner.EXE");
	while(pid);

	statusFilename = "./tmp/" + sourceCode + ".out.status";
	status.open(statusFilename.c_str());
	status>>temp_string;
	status.close();
	if(temp_string == "RE")
	{
		cout<<"Runtime Error\n";
		return runtimeError;
	}
	else if(temp_string == "TLE" || temp_string == "137")
	{
		cout<<"TimeLimit Exceeded\n";
		return timeLimitExceeded;
	}

	string compare;
	compare = "./bin/Compare.EXE ./tmp/" + sourceCode + ".out.output " + outputFile;
	system(compare.c_str());

	statusFilename = "./tmp/" + sourceCode + ".out.output.status";
	status.open(statusFilename.c_str());
	status>>temp_string;
	status.close();

	if(temp_string == "WA")
	{
		cout<<"Wrong Answer\n";
		return wrongAnswer;
	}

	cout<<"All Correct\n";
	return allCorrect;
}

