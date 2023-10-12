#include<iostream>
#include<stack>
#include<string>
using namespace std;
int priority(char x)
{
    if(x=='^'||x=='$')
    {
        return 3;
    }
    else if(x=='*'||x=='/')
    {
        return 2;
    }
    else if(x=='+'||x=='-')
    {
        return 1;
    }   
    else
    {
        return -1;
    }
}
int main()
{
    string infix,postfix;
    stack <char> a;
    cout<<"Enter infix notation : ";
    cin>>infix;
    for (int i = 0; i < 14; i++)
    {
        
        
        
        
    }
    return 0;
}