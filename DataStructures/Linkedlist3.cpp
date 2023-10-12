#include<iostream>
using namespace std; 
//Singly Linked list
class node
{
    public:
    int data;
    node *next;
};
//Insertion Functions
void insertfront(node **head,int info)
{
    node *new_node=new node();
    new_node->data=info;
    if(*head==NULL)
    {
        new_node->next=NULL;
        *head=new_node;
    }
    else
    {
        new_node->next=*head;
        *head=new_node;
    }
}
void insertafter(node *prev,int info,int i)
{
    //prev is head
    node *new_node=new node();
    new_node->data=info;
    //node *last=*head;
    if(prev==NULL)
    {
        new_node->next=NULL;
        prev=new_node;
    }
    else
    {
        while(i-1!=0)
        {
            prev=prev->next;
            i--;
        }
        new_node->next=prev->next;
        prev->next=new_node;
    }
}
void insertbefore(node *prev,int info,int i)
{
    //prev is head
    node *new_node=new node();
    new_node->data=info;
    node *last=prev;
    if(prev==NULL)
    {
        new_node->next=NULL;
        prev=new_node;
    }
    else
    {
        if (i>1)
        {
            while(i-1!=0)
            {
                prev=prev->next;
                i--;
            }
            while (last->next!=prev)
            {
                last=last->next;
            }
            new_node->next=last->next;
            last->next=new_node;
        }
    }
}
void insertrear(node **head,int info)
{
    node *new_node=new node();
    node *last=*head;
    new_node->data=info;
    if(*head==NULL)
    {
        new_node->next=NULL;
        *head=new_node;
    }
    else
    {
        while (last->next!=NULL)
        {
            last=last->next;
        }
        last->next=new_node;
        new_node->next=NULL;
    }
}
//Deletion Functions for LL
void deletefront(node **head)
{
    
    if(head==NULL||*head==NULL)
    {
        cout<<"Empty";
    }
    else
    {
        node *n=*head;
        *head=(*head)->next;
        free(n);
    }
}
void deleterear(node **head)
{
    node *last=*head;
    if(head==NULL||*head==NULL)
    {
        cout<<"Empty";
    }
    else
    {
        node *n=*head;
        while (n->next!=NULL)
        {
            n=n->next;
        }
        while (last->next!=n)
        {
            last=last->next;
        }
        last->next=NULL;
        free(n);
    }
}
void deleteat(node **head,int i)
{
    node *last=*head;
    if(head==NULL||*head==NULL)
    {
        cout<<"Empty";
    }
    else
    {
        node *n=*head;
        if(i>1)
        {
            while (i-1!=0)
            {
                n=n->next;
                i--;
            }
            while (last->next!=n)
            {
                last=last->next;
            }
            last->next=n->next;
            free(n);
        }
        
    }
}

//Display Function for LL
void display(node *head)
{
    while (head!=NULL)
    {
        cout<<"DATA :"<<head->data<<" Next node address : "<<head->next<<endl;
        head=head->next;
    }
    
}
int main()
{
    node *ptr=NULL;
   // deletefront(&ptr); 
    insertfront(&ptr,30);
    insertfront(&ptr,20);
    insertfront(&ptr,10);
    insertafter(ptr,50,1);
    insertafter(ptr,40,2);
    insertbefore(ptr,70,2);
    insertrear(&ptr,60);
    deleteat(&ptr,2);
    //cout<<ptr->data;
    //deletefront(&ptr);
    //deleterear(&ptr);
    display(ptr);
    //free(ptr);
    //display(ptr);

    return 0;
}
