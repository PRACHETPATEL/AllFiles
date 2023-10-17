package com.prachet.practicals;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Scanner;
public class MakingChangeDemo {
    public static List<Integer> coinsrequired(List<Integer> coins,int payable){
        List<Integer> ans=new ArrayList<Integer>();
         for(int i=coins.size()-1;i>=0;i--){
            while(payable>=coins.get(i)){
                payable-=coins.get(i);
                ans.add(coins.get(i));
            }
            if(payable==0) break;
        }
        return ans;
    }
    public static void main(String[] args) {
        List<Integer> coins=new ArrayList<Integer>();
        List<Integer> ans=new ArrayList<Integer>();
        Scanner in=new Scanner(System.in);
        Collections.sort(coins);
        System.out.println("Enter the number of coins you have:");
        int size=in.nextInt();
        System.out.println("Enter "+size+" type of coins you have:");
        for (int i = 0; i < size; i++) {
            int note=in.nextInt();
            coins.add(note);
        }
        System.out.println("Enter the amount you have to pay:");
        int payable=in.nextInt();
        ans=coinsrequired(coins,payable);
        System.out.println("The minimum number of coins required:"+ans.size());
        System.out.println("The minimum number of coins you have to provide are:"+ans);
    }
}
