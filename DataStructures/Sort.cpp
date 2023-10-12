#include<iostream>
using namespace std;
int main()
{
    int size;
    cout<<"array size:";
    cin>>size;
    int arr[size];
    cout<<"enter array:";
    for (int i = 0; i < size; i++)
    {
        cin>>arr[i];
    }
    for(int i=0;i<size;i++)
    {
        int k=0;     
        for(int j=i+1;j<size;j++)//optimum
        {
            if(arr[k]>arr[k+1])
            {
                swap(arr[k],arr[k+1]);
            }
           k++;
        }                                            
        /*for(int j=k+1;j<size;j++)
        {
            if(arr[k]>arr[j])  //Less optimize   loop runs size if 5 than 5 times extra
            {
                swap(arr[k],arr[j]);
            }
            k++;
        }*/
    }
    for (int i = 0; i < size; i++)
    {
        cout<<arr[i]<<" ";
    }
    return 0;
}