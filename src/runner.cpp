#include <iostream>
#include <string>
#include <fstream>
#include "help_func.h"
#include <stdlib.h>
#include <time.h>
#include <unistd.h>
#include <signal.h>

using namespace std;

int main(int argc,char *argv[])
{
	string usrexe,inputFile;
	double timeLimit;
	
	switch(argc)
	{
	case 4:
		usrexe = argv[1];
		usrexe += ".out";
		inputFile = argv[2];
		timeLimit = ::atof(argv[3]);
	break;
	default:
		cout<<"Wrong number of arguments\n";
		exit(EXIT_FAILURE);
	}

	clock_t start,end;
	pid_t child = fork();

	if(child < 0)
	{
		cout<<"Child couldnt be created\n";
		exit(EXIT_FAILURE);
	}
	else if(child == 0)
	{
		string commandRunner;
		commandRunner = "./bin/runner.sh " + inputFile + " " + usrexe;
		start = clock();
		system(commandRunner.c_str());
		end = clock();

		string timeFile = "./tmp/" + usrexe + ".time";
		fstream writeTime;
		writeTime.open(timeFile.c_str(),ios::out);
		writeTime<<fixed<<(double)(end-start)/CLOCKS_PER_SEC<<endl;
		writeTime.close();

		exit(EXIT_SUCCESS);
	}
	
	start = clock();
	while(1)
	{
		end = clock();
		if(double(end-start)/CLOCKS_PER_SEC >= timeLimit)
			break;
	}
	pid_t usrPID = getPID(usrexe);
	string statusFile = "./tmp/" + usrexe + ".status";
	string temp_str;
	fstream writeStatus;
	if(usrPID)
	{
		kill(usrPID,SIGKILL);
	}
	writeStatus.open(statusFile.c_str(),ios::in);
	writeStatus>>temp_str;
	writeStatus.close();
	writeStatus.open(statusFile.c_str(),ios::out);
	if(temp_str == "0")
		writeStatus<<"SR\n";
	else if(temp_str == "139")
		writeStatus<<"RE\n";
	else if(temp_str.size() == 0)
		writeStatus<<"TLE\n";
	writeStatus.close();
	return 0;
}