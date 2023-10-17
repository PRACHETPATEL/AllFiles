import java.util.ArrayList;
import java.util.Scanner;
public class MakingChangeDemo{
    public static int MakeChange(int[] values,int[][] coins,int change){
        for(int i=0;i<values.length;i++){
            for(int j=0;j<change;j++){
                if(i==0){
                    coins[i][j]=0;
                }
                if(j==0){
                    coins[i][j]=0;
                }
                if(j>=1&&i>=1){
                    if(i==1&&(j-values[i]>=0)){
                        coins[i][j]=1+coins[1][j-values[i]];
                    }
                    else if(j<values[i]){
                        coins[i][j]=coins[i-1][j];
                    }
                    else{
                        coins[i][j]=Math.min(coins[i-1][j],1+coins[i][j-values[i]]);
                    }
                }
                System.out.print(coins[i][j]+"  ");
            }
            System.out.println();
        }
        return coins[values.length-1][change-1];
    }
    public static ArrayList<String> backTracking(int[][] coins, int[] values, int change, int changereq){
        ArrayList<String> ans=new ArrayList<>();
        int i=values.length-1;
        int j=change-1;
        while (i>0&&j>0) {
            if (coins[i][j] == coins[i - 1][j]) {
                i--;
            } else {
                if (changereq != 0) {
                    ans.add("item " + changereq + ", value=" + values[i] + "; ");
                    j -= values[i];
                    changereq--;
                }
            }
        }
        return ans;
    }
    public static void main(String[] args) {
        int n,change;
        Scanner in=new Scanner(System.in);
        System.out.println("Enter Number of coins you have: ");
        n=in.nextInt();
        n++;
        System.out.println("Enter "+(n-1)+" coins values: ");
        int[] values=new int[n];
        values[0]=0;
        for(int i=1;i<n;i++){
            values[i]=in.nextInt();
        }
        System.out.println("Enter amount to make change for: ");
        change=in.nextInt();
        change++;
        int[][] coins=new int[n][change];
        System.out.println("Optimum solution:");
        int changereq=MakeChange(values, coins, change);
        System.out.println("Total minimum coins required: "+changereq);
        System.out.println(backTracking(coins, values, change,changereq));
        in.close();
    }
}
