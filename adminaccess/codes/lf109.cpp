#include<iostream>
using namespace std ;
int main()
{
    int t ;
    cin>>t ;
    while(t)
    {
        int n ,sum=0 ,i ;
        cin>> n ;
        while(n)
        {
            if(n%10==4)
                sum+=1;
            n/=9;
        }
        cout<<sum<<endl ;
        t--;
    }
    return 0 ;
}