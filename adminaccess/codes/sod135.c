#include<iostream>
using namespace std ;
int main()
{
    int t ;
    cin>>t ;
    while(t)
    {
        int n , sum=0 , i ;
        cin>>n ;
        while(n>0)
        {
            sum+=n%10;
            n/=10;
        }
        cout<<sum<<endl ;
        t--;
    }
    return 0 ;
}