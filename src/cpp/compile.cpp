#include <string.h>
#include <stdio.h>
#include <stdlib.h>
#include "errors.h"
#include <string>
#include <iostream>

using namespace std;

int main(int argc,char *argv[])
{
	string compiler,source_code;
	string command = "src/bash_scripts/compile.sh";

	switch(argc)
	{
	case 1:
		printf("%d\n",ERROR_noArguments);
		exit(EXIT_FAILURE);
	break;

	case 2:
		printf("%d\n",ERROR_noSourceCode);
		exit(EXIT_FAILURE);
	break;

	case 3:
		if(strcmp(argv[1],"gcc") == 0)
		{
			compiler = "gcc";
		}
		else if(strcmp(argv[1],"g++") == 0)
		{
			compiler = "g++";
		}
		else
		{
			printf("%d\n",ERROR_wrongCompiler);
			exit(EXIT_FAILURE);
		}

		source_code = argv[2];
		command = command + " " + compiler + " " + source_code;
		system(command.c_str());
	break;

	default:
		printf("%d\n",ERROR_wrongArguments);
		exit(EXIT_FAILURE);
	}
	
	return 0;	
}