<<<<<<< HEAD
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
	string time_limit,size_limit,input_filename,usr_exe;

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

	string timer,runner,command;
	timer = "bin/timer.sh";
	runner = "bin/runner.sh";

	timer = timer + " " + time_limit + " " + size_limit + " " + usr_exe + " &";
	runner = runner + " " + input_filename + " " +usr_exe;
	command = timer + runner;

	system(command.c_str());

=======
#include <stdio.h>
#include <iostream>

using namespace std;

int main()
{
	
>>>>>>> cf78917fad1fa56c32072c159a12c17d7921e0da
	return 0;
}