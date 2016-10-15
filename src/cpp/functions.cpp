#include "functions.h"
#include <ctype.h>
#include <string.h>
#include <stdlib.h>
#include <fstream>
#include <string>

using namespace std;	

bool isNumber(char *str)
{
	int size = strlen(str);
	int flag = 0;
	for(int i=0;i<size;i++)
	{
		if(!isdigit(str[i]))
		{
			flag = 1;
			break;
		}
	}

	if(flag)
	{
		return (false);
	}
	else
	{
		return (true);
	}
}

bool exist_file(string str)
{
	string command;
	command = "./bin/exist_file.sh ";
	command += str;
	system(command.c_str());

	fstream status;
	string status_check;

	status.open("./tmp/file.status",ios::in | ios::out);
	status>>status_check;
	status.close();

	if(status_check == "FE")
		return true;
	else
		return false;
}