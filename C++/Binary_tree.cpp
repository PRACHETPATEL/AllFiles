#include<iostream>
using namespace std;
struct node{
    int data;
    struct node *left;
    struct node *right;
};
struct node create(struct node **head)
{
    struct node *nnode=new struct node();
    if(*head==NULL)
    {
        cout<<"Enter value for root node : ";
        cin>>nnode->data;
        nnode->left=NULL;
        nnode->right=NULL;
        *head=nnode;
    }
    else return **head;
}
struct node insert(struct node **head,int val)
{
    struct node *nnode=new struct node(),*temp=*head,*temp2;
    nnode->data=val;
    nnode->left=NULL;
    nnode->right=NULL;
    if(nnode->data<temp->data)
    {
        while (nnode->data<temp->data)
        {
            if (temp->left==NULL)
            {
                temp->left=nnode;
                temp2=nnode;
            }
            else
            {
                temp=temp->left;
            }
        }   
    }
    else
    {
        while (nnode->data>(temp)->data)
        {
            if (temp->right==NULL)
            {
                temp->right=nnode;
                temp2=nnode;
            }
            else
            {
                temp=temp->right;
            }
        }
    }
    if(temp->left!=temp2||temp->right!=temp2)
    {
        insert(&temp,nnode->data);
    }  
    else return **head;
}
struct node display(struct node *head)
{
    cout<<"root :"<<head->data<<" "<<endl;
    head=head->left;
    cout<<"left :"<<head->data<<" "<<endl;
    head=head->right;
    cout<<"right :"<<head->data<<" "<<endl;
    head=head->right;
    cout<<"right :"<<head->data<<" "<<endl;
}
void displayinorder(struct node *head)
{
    if (head==NULL) {
      return;
    } 
    displayinorder(head->left);
    cout<<head->data<<" ";
    displayinorder(head->right);
}
int main()
{
    struct node *ptr=NULL;
    create(&ptr);
    insert(&ptr,10);
    insert(&ptr,30);
    insert(&ptr,12);
    insert(&ptr,12);
    insert(&ptr,13);
    displayinorder(ptr);
    return 0;
}