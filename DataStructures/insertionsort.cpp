#include<iostream>
using namespace std;
int main()
{
    int size;
    cout<<"size :";
    cin>>size;
    int arr[size];
    cout<<"array:";
    for(int i=0;i<size;i++)
    {
        cin>>arr[i];
    }
    for(int i=0;i<size;i++)
    {
        if(arr[i]>arr[i+1])
       {
            swap(arr[i],arr[i+1]);
            if(i>0 && arr[i]<arr[i-1])
            {
                for(int k=i;k>0;k--)
                {
                    if(arr[k]<arr[k-1])
                    {
                        swap(arr[k],arr[k-1]);
                    }
                    else break;
                }
            }
        }
    }
    cout<<"array:";
    for(int i=0;i<size;i++)
    {
        cout<<arr[i]<<" ";
    }
    return 0;
}