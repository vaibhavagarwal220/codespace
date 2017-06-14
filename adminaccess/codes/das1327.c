    #include <stdio.h>
     
    int main(void) {
       int t,n;
       scanf("%d",&t);
       while(t)
       {
           scanf("%d",&n);
           int arr[n+1],i;
           for(i=0;i<n;i++)
           {
               scanf("%d",&arr[i]);
           }
          n=n-1;
           int m=0;
           while(n!=0&&(arr[m]<=arr[m+1]))
           {
               m=m+1;
               n--;
           }
           if(n==0)
           {
               printf("%d\n",-1);
           }
           else
           printf("%d\n",m+1);
       }
       return 0;
    } 