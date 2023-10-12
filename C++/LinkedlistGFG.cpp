// Online C++ compiler to run C++ program online
#include <iostream>
using namespace std;
class node
{
    public:
  int data;
  node *next;
};
void insertb(node **head,int info)
{
    node *new_node=new node();
    new_node->data=info;
    new_node->next=(*head);
    (*head)=new_node;
    //head->next=NULL;
}
void insertafter(node *prev_node,int info)
{
    node *new_node=new node();
    new_node->data=info;
    new_node->next=prev_node->next;
    prev_node->next=new_node;
    
}
void insertend(node **head,int info)
{
    node *new_node=new node();
     node *last=*head;
    new_node->data=info;
    new_node->next=NULL;
    if(*head==NULL)
    {
        *head=new_node;
    }
    else
    {
    while(last->next!=NULL)
    {
        last=last->next;
    }
    last->next=new_node;
    }
}
void deletefront(node *head)
{
    node *n;
    //node *new_node;
    if(head==NULL)
    {
        cout<<"empty";   
    }
    else
    {
        n=head;
        head=head->next;
        ///n->next=NULL;
        free(n);
    }
    return;
}
void display(node *n)
{
    while(n!=NULL)
    {
        cout<<n->data<<" ";
        n=n->next;
    }
}
int main() {
    node *ptr1=NULL,*ptr2,*ptr3;
   insertend(&ptr1,50);
    insertb(&ptr1,40);
    insertb(&ptr1,30);
    insertend(&ptr1,20);
    deletefront(ptr1);
   //ptr2=ptr1->next;
   //ptr2=ptr2->next;
     // ptr3=ptr2->next;
         //ptr2=ptr1->next;
   // insertafter(ptr3,90);
    //insertafter(ptr1,80);
    //insertb(&ptr1,70);
    
    //insertb(&ptr1,70);
    display(ptr1);
    return 0;
}