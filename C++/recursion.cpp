#include<iostream>
using namespace std;
int fact(int n)
{
    int x;
    if (n==1)
    {
        return 1;
    }
    else 
    { 
        x=n*fact(n-1);
    }
    return x;
}
int exp(int n,int m)
{
    if (m==0)
    {
        return 1;
    }
    else return n*exp(n,m-1);
}
long long int fib(int n)
{
    if (n==0)
    {
        return 0;
    }
    else if(n==1) return 1;
    else return fib(n-1)+fib(n-2);
}
int main()
{
    int a,b,c,d;
    cout<<"Number for factorial:";
    cin>>a;
    cout<<"Numbers for exponential a^b:";
    cin>>b>>c;
    cout<<"Postion to find fibonacci number:";
    cin>>d;
    cout<<"factorial :"<<fact(a)<<endl<<"Exponential :"<<exp(b,c)<<endl<<"Fibonacci : "<<fib(d)<<endl;
    return 0; 
}