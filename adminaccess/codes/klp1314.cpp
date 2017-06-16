    #include <bits/stdc++.h>
    using namespace std;
    int main(){
    	int t;
    	scanf("%d",&t);
    	while(t--){
    		char str[26];
    		scanf("%s",str);
    		char ch[27];
    		for(int i=1;i<=26;i++)
    			ch[i]=str[i-1];
    		int test;
    		scanf("%d",&test);
    		while(test--){
    			int num;
    			scanf("%d",&num);
    			while(num--)
    			{
    				int x;
    				scanf("%d",&x);
    				printf("%c",ch[x]);
    			}
    			printf("\n");
    		}
    	}
    	return 0;
    } 