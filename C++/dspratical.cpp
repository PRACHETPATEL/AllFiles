#include<iostream>
using namespace std;
struct node{
    int data;
    struct node *next;
};
void insert(struct node **head,int info)
{
    struct node *nnew=new struct node(),*last=*head;
    if(*head==NULL)
    {
        nnew->data=info;
        nnew->next=NULL;
        *head=nnew;
    }
    else
    {
        while (last->next!=NULL)
        {
            last=last->next;
        }
        nnew->data=info;
        nnew->next=NULL;
        last->next=nnew;        
    }
}
void displayrev(struct node *head)
{
    if(head!=NULL)
    {
        displayrev(head->next);
        cout<<head->data<<" ";
    }
}
void count(struct node *head)
{
    int count=0;
    while(head!=NULL)
    {
        head=head->next;
        count++;
    }
    cout<<endl<<"total number of nodes: "<<count<<endl;
}
int main()
{
    struct node *ptr=NULL;
    insert(&ptr,10);    
    insert(&ptr,20);    
    insert(&ptr,30); 
    insert(&ptr,40); 
    insert(&ptr,50); 
    insert(&ptr,60); 
    displayrev(ptr);
    count(ptr);
    return 0;
}