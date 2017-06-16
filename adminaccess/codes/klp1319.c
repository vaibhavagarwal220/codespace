#include <stdio.h>
 
int main(void) {
    int t,N,p,q,i,check=0;
    char alp[27];
    scanf("%d",&t);
   while(t--)
   {
       scanf("%s",&alp);
        scanf("%d",&N);
        while(N--)
        {
            scanf("%d",&p);
            while(p--)
            {
                scanf("%d",&q);
                printf("%c",alp[q-1]);
            }
            printf(" ");
        }
        printf("\n");
        
    }
	return 0;
}