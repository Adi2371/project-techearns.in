#include <iostream>
using namespace std;
int main()
{
    int b, a;
    int result = 1;
    cout<<"Enter a number b: ";
    cin>>a>>b;
    for (int i = 1; i < b; i++)
    {
        result = result * i;
    }
    cout<<result;

    
}