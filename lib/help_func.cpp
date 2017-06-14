#include "help_func.h"
#include <stdlib.h>
#include <iostream>
#include <fstream>
#include <algorithm>	

bool isnumber(string str)
{
	int size = str.size();
	bool ctr = false;
	for(int i=0;i<size;i++)
		if(!isdigit(str[i]) && 
			ctr && str[i] != '.')
			return false;
		else if(str[i] == '.')
			ctr = true;
	return true;
}

bool existFile(string str)
{
	string command = "./bin/existFile.sh " + str;
	system(command.c_str());

	ifstream checkFile;
	checkFile.open("./tmp/fileStatus");
	string check;
	checkFile >> check;
	checkFile.close();
	system("rm -r ./tmp/fileStatus");

	if(check != "exist") 	
		return false;
	else
		return true;
}

string extractFile(string dir)
{
	string file;
	int size = dir.size();
	for(int i=size-1;i>=0;i--)
	{
		if(dir[i] == '/')
			break;
		file.push_back(dir[i]);
	}
	reverse(file.begin(),file.end());
	return file;
}

int getPID(string process)
{
	string command;
	command = "./bin/getPID.sh " + process;
	system(command.c_str());
	process += ".pid";
	process = "./tmp/" + process;
	fstream file;
	file.open(process.c_str(),ios::out | ios::in);
	int pid = 0;
	file>>pid;
	file.close();
	command = "rm " + process;
	system(command.c_str());
	return pid;
}