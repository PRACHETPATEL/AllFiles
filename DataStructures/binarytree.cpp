#include<iostream>
using namespace std;
struct node
{
    int data;
    struct node *prev;
    struct node *next;
};
struct node create(node **head,int info)
{
    struct node *new_node=new struct node(),*trav=*head;
    new_node->data=info;
    if(*head==NULL)
    {
        new_node->prev=NULL;
        new_node->next=NULL;
    }
    else
    {
        if(info<trav->data)
        {   
            trav->prev=new_node;
            new_node->prev=NULL;
            new_node->next=NULL;
        }
        else
        {
            trav->next=new_node;
            new_node->prev=NULL;
            new_node->next=NULL;
        }   
    }
}
int main()
{
    struct node *bit=NULL;
    return 0;
}