#include<iostream>
using namespace std;
//not optimized
int top=-1;
char stack[6];
char push(char a)
{
    if (top==5)
    {
        cout<<"OverFlow";
    }
    else
    {
        top=top+1;
        stack[top]=a;
    }
}
char pop()
{
    
    
        char val=stack[top];
        top=top-1;
}
int main()
{
    char gar[6];
    cout<<"Enter perenthesis : ";
    cin>>gar;
    for (int i = 0; i < 6; i++)
    {
        if(gar[i]=='(')
        {
            push(gar[i]);
        }
        else if(gar[i]==')')
        {
            pop();
        }
    }
    for (int i = 0; i < 6; i++)
    {
        if(gar[i]=='{')
        {
            push(gar[i]);
        }
        else if(gar[i]=='}')
        {
            pop();
        }
    }
    for (int i = 0; i < 6; i++)
    {
        if(gar[i]=='[')
        {
            push(gar[i]);
        }
        else if(gar[i]==']')
        {
            pop();
        }
    }
    cout<<top<<endl;
    if(top<-1)
    {
        cout<<"underflow";
    }
    else if(top==-1)
    {
        cout<<"Valid Expression"<<endl;
    }
    else if(top>-1)
    {
        cout<<"Invalid at index : "<<top<<" "<<stack[top]<<"  is not closed in: "<<gar<<endl;
    }
    else
    {
        return -1;
    }
    return 0;
}