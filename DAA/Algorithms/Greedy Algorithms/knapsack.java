package DAA;

import java.util.*;

class Item{
    int value;
    int weight;
}

public class knapsack implements Comparator<Item>{
    @Override
    public int compare(Item a, Item b){
        double r1 = (double)(a.value) / (double)(a.weight);
        double r2 = (double)(b.value) / (double)(b.weight);
        if(r1<r2) return 1;
        else if(r1>r2) return -1;
        else return 0;
    }
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.println("Enter number of items");
        int size = in.nextInt();
        in.nextLine();        
        Item items[] = new Item[size];
        System.out.println("Enter maximum weight for knapsack");
        int weight = in.nextInt();
        in.nextLine();
        for(int i=0;i<items.length;i++){
            items[i] = new Item();
            System.out.println("Enter weight and value for item " + (i+1));
            items[i].weight = in.nextInt();
            items[i].value = in.nextInt();            
        }
        double ans = fractionalKnapsack(weight,items,items.length);
        System.out.println("The maximum value of Knapsack is: "+ans);
    }

    static double fractionalKnapsack(int W, Item[] arr,int n){
        Arrays.sort(arr,new knapsack());
        int currWeight=0;
        double finalVal=0.0;

        for(int i=0;i<arr.length;i++){
            if(currWeight+arr[i].weight<=W){
                currWeight+=arr[i].weight;
                finalVal+=arr[i].value;
            } else{
                int remain = W - currWeight;
                finalVal+=(double)remain * (double)(arr[i].value) / (double)(arr[i].weight);
                break;
            }
        }
        return finalVal;
    }
}