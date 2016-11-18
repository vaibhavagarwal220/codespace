// C program to demonstrate delete operation in binary search tree
#include <stdio.h>
#include <stdlib.h>

typedef struct BST
{
    int key;
    struct BST *left, *right;
}Node;

// A utility function to create a new BST 
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

/* A utility function to insert a new BST with given key in BST */
Node* insert(Node* BST, int key)
{
    /* If the tree is empty, return a new BST */
    if (BST == NULL) return newNode(key);

    /* Otherwise, recur down the tree */
    if (key < BST->key)
        BST->left  = insert(BST->left, key);
    else
        BST->right = insert(BST->right, key);

    /* return the (unchanged) BST pointer */
    return BST;
}
Node *lca(Node *root,int key1,int key2)
{
  if(root!=NULL)
  {
    if(root->key<=key2 && root->key>=key1) return root;
    else if (root->key<key1 && root->key<key2) return lca(root->right,key1,key2);
    else return lca(root->left,key1,key2);
  }
}
int search(Node *root,int key)
{
  if(root!=NULL)
  {
    if(root->key==key)return 1;
    else if(root->key>key)return search(root->left,key);
    else if(root->key<key)return search(root->right,key);
  }
  else return 0;
}
int main()
{
  Node *root=NULL,*task=NULL;
  int key1,key2,flag1=0,flag2=0,N,tmp;
  /* Let us create following BST
              60
           /     \
          40      80
         /  \    /  \
       10   50  70   100 */
    root = insert(root, 60);
    root = insert(root, 40);
    root = insert(root, 80);
    root = insert(root, 10);
    root = insert(root, 50);
    root = insert(root, 80);
    root = insert(root, 70);
    root = insert(root, 100);
    printf("Please enter the keys\n");
    while(1)
    {
      scanf("%d %d",&key1,&key2);
      flag1=search(root,key1);
      flag2=search(root,key2);
      if(flag1==1 && flag2==1)break;
      printf("Entered value of keys not present in binary search tree\n");
      printf("Please enter the correct values\n");
    }
    if(key2<key1)
    {
      tmp=key1;
      key1=key2;
      key2=tmp;
    }
    task=lca(root,key1,key2);
    printf("%d\n",task->key);
}
