#include <iostream>
using namespace std;
 
int arr[10010];
 
int main()
{
    ios::sync_with_stdio(false);
    int test;
    cin>>test;
    while(test--) {
        string decrypt;
        cin>>decrypt;
        int n;
        cin>>n;
        while(n--) {
            int s,i;
            string out = "";
            cin>>s;
            while(s--) {
                cin>>i;
                out+=decrypt[i-1];
            }
            cout << out << "\n";
        }
    }
    return 0;
}