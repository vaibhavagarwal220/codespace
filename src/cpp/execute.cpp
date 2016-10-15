#include <fstream>
#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include "errors.h"
#include <string>
#include <iostream>
#include "functions.h"

using namespace std;

int main(int argc,char *argv[])
{
	string time_limit,size_limit,input_filename,source_code,usr_exe;

	switch(argc)
	{
	case 1:
	case 2:
	case 3:
	case 4:
		cout<<ERROR_wrongArguments<<endl;
		exit(EXIT_FAILURE);
	break;
	case 5:
		if(!isNumber(argv[1]))
		{
			cout<<ERROR_wfTimeLimit<<endl;
			exit(EXIT_FAILURE);
		}
		if(!isNumber(argv[2]))
		{
			cout<<ERROR_wfSizeLimit<<endl;
			exit(EXIT_FAILURE);
		}

		time_limit = argv[1];
		size_limit = argv[2];
		input_filename = argv[3];
		usr_exe = argv[4];
	break;
	default:
		cout<<ERROR_wrongArguments<<endl;
		exit(EXIT_FAILURE);
	}

	string temp = "./input/" + input_filename;
	if(!exist_file(temp))
	{
		cout<<ERROR_ifnf<<endl;
		exit(EXIT_FAILURE);
	}

	temp = "./tmp/" + usr_exe;
	if(!exist_file(temp))
	{
		cout<<ERROR_outnf<<endl;
		exit(EXIT_FAILURE);
	}

	source_code = ".out";
	source_code = usr_exe.substr(0,usr_exe.size() - source_code.size());

	string runner,command;
	runner = "./bin/runner.sh";
	command = runner + " " + time_limit + " " + size_limit + " " + input_filename + " " + usr_exe;

	system(command.c_str());

	string status_filename = "./tmp/" + source_code + ".status";
	string error_filename = "./tmp/" + source_code + ".err";
	fstream status,error;
	status.open(status_filename.c_str(),ios::in | ios::out);
	error.open(error_filename.c_str(),ios::in | ios::out);

	if(!status.is_open())
	{
		cout<<ERROR_sfnf<<endl;
		exit(EXIT_FAILURE);
	}
	if(!error.is_open())
	{
		cout<<ERROR_efnf<<endl;
		exit(EXIT_FAILURE);
	}

	string status_check;
	status>>status_check;

	if(status_check == "RE")
	{
		cout<<"Runtime Error\n"<<endl;
	}
	else if(status_check == "TLE")
	{
		cout<<"Time Limit Exceeded"<<endl;
	}
	else
	{
		cout<<"Successful\n";
	}

	error.close();
	status.close();
	return 0;
}