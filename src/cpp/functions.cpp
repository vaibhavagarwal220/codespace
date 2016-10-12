#include "functions.h"
#include <ctype.h>
#include <string.h>

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

