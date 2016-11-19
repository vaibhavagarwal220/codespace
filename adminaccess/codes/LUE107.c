#include<stdio.h>

int main()
{
	int num;
	while(1)
	{
		scanf("%d",&num);
		printf("%d\n",num);
		if(num == 42)
			break;
	}
	return 0;
}