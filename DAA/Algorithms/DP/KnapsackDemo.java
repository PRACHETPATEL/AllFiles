package DAA;

import java.util.ArrayList;
import java.util.Arrays;

class KnapsackDemo {
    public static void main(String[] args){
        int[] weight = {0,2,3,4,5};
        int[] values ={0,1,2,5,6} ;
        int W = 8;
        System.out.println("Weight: " + Arrays.toString(weight));
        System.out.println("Values: " + Arrays.toString(values));
        System.out.println("Maximum capacity is: " + W);
        System.out.println("Optimum Solution:");
        int[][] dp = new int[weight.length][W+1];
        int ans = knapsack(dp,weight,values,weight.length,W+1);
        System.out.println("Maximum value that we can get is: " + ans);
        System.out.println("Items used(BackTracking):"+backTracking(dp,values,weight,W+1,ans));
    }
    public static ArrayList<String> backTracking(int[][] knapsack, int[] values, int[] weight,int maxweight, int weigntreq){
        ArrayList<String> ans=new ArrayList<>();
        int i=values.length-1;
        int j=maxweight-1;
        int k=1;
        while (i>0&&j>0) {
            if (knapsack[i][j] == knapsack[i - 1][j]) {
                i--;
            } else {
                ans.add("[item " + k + ", value=" + values[i] + ", weight="+weight[i]+"]");
                j-=weight[i];
                k++;
            }
        }
        return ans;
    }
    static int knapsack(int[][] dp,int[] wt, int[] val, int n, int W){
        for(int index=0;index<n;index++){
            for(int cap=0;cap<W;cap++){
                if(index==0){
                    dp[index][cap]=0;
                }
                if(cap==0){
                    dp[index][cap]=0;
                }
                if(index>=1&&cap>=1){
                    if(cap<wt[index]){
                        dp[index][cap]=dp[index-1][cap];
                    }
                    else {
                        dp[index][cap]=Math.max(dp[index-1][cap],dp[index-1][cap-wt[index]]+val[index]);
                    }
                }
                System.out.print(dp[index][cap]+"  ");
            }
            System.out.println();
        }
        return dp[n-1][W-1];
    }
}