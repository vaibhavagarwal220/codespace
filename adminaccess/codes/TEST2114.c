#include<stdio.h>
#include<stdlib.h>

typedef struct node
{
    int key;
    struct node *left, *right;
}Node;

// A utility function to create a new BST node
Node  *newNode(int item)
{
    Node *temp =  (Node *)malloc(sizeof(Node));
    temp->key = item;
    temp->left = temp->right = NULL;
    return temp;
}

// A utility function to do inorder traversal of BST
void inorder(Node *root)
{
    if (root != NULL)
    {
        inorder(root->left);
        printf("%d ", root->key);
        inorder(root->right);
    }
}

/* A utility function to insert a new node with given key in BST */
Node* insert(Node* node, int key)
{
    /* If the tree is empty, return a new node */
    if (node == NULL) return newNode(key);

    /* Otherwise, recur down the tree */
    if (key < node->key)
        node->left  = insert(node->left, key);
    else
        node->right = insert(node->right, key);

    /* return the (unchanged) node pointer */
    return node;
}

void linked(Node *root,Node **flag,Node **Head)
{
    if (root == NULL) return ;
    linked(root->left,flag,Head);
    if (*flag == NULL)
        *Head = root;
    else
    {
        root->left = (*flag);
        (*flag)->right = root;
    }
    (*flag)= root;
    linked(root->right,flag,Head);
}
int main()
{
  Node *Head=NULL,*flag=NULL;
    /* Let us create following BST
              60
           /     \
          40      80
         /  \    /  \
       10   50  70   100 */
    Node *root = NULL;
    root = insert(root, 60);
    root = insert(root, 40);
    root = insert(root, 80);
    root = insert(root, 10);
    root = insert(root, 50);
    root = insert(root, 70);
    root = insert(root, 100);
    linked(root,&flag,&Head);
    Node *tmp=Head;
    while(tmp!=NULL)
    {
      printf("%d %p %p %p\n",tmp->key,tmp->left,tmp->right,tmp);
      tmp=tmp->right;
    }
}