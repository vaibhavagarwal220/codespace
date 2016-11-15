#include <stdio.h>
#include <stdlib.h>
#include <limits.h>
 
struct BinTree
{
    int key;
    struct BinTree* left;
    struct BinTree* right;
};

struct BinTree* newNode(int key)
{
  struct BinTree* BinTree = (struct BinTree*)malloc(sizeof(struct BinTree));
  BinTree->key = key;
  BinTree->left = NULL;
  BinTree->right = NULL;
 
  return(BinTree);
}
 

int isBST(struct BinTree* BinTree, int min, int max) 
{ 
  
  if (BinTree==NULL)                                           //Empty tree is BST
     return 1;
       
  
  if (BinTree->key < min || BinTree->key > max)                 //Max value of left subtree is less than BinTree key and min value of right subtree is greater than BinTree key
     return 0; 
 
  return                                                    
    isBST(BinTree->left, min, BinTree->key) && isBST(BinTree->right, BinTree->key, max); 
} 


int BST(struct BinTree* BinTree) 
{ 
  return(isBST(BinTree, INT_MIN, INT_MAX)); 
} 



 
/* Driver program to test above functions*/
int main()
{
  struct BinTree *root = newNode(4);
  root->left = newNode(4);
  root->right       = newNode(4);
  root->left->left  = newNode(4);
  root->left->right = newNode(4); 
 
  if(BST(root))
    printf("Is BST\n");
  else
    printf("Not a BST\n");
     
  return 0;
}
