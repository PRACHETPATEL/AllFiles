import java.util.Arrays;
import java.util.Random;
import java.util.Scanner;
public class SearchArray {
    public static int linearsearch(int[] arr,int target){
        for(int i=0;i<arr.length;i++){
            if(arr[i]==target){
                return i;
            }
        }
        return -1;
    }
    public static int binarysearch(int[] arr,int target){
        int low=0;
        int up=arr.length-1;
        int mid=(up+low)/2;
        while(low<up){
            if(arr[mid]>target){
                up=mid-1;
            }
            else if(arr[mid]<target){
                low=mid+1;
            }
            else{
                return mid;
            }
            mid=(up+low)/2;
        }
        return -1;
    }
      public static int trinarysearch(int[] arr,int target){
        int low=0;
        int up=arr.length-1;
        int mid=(up+low)/2;
        while(low<up){
            if(arr[mid]>target){
                up=mid-1;
            }
            else if(arr[mid]<target){
                low=mid+1;
            }
            else{
                return mid;
            }
            mid=(up+low)/2;
        }
        return -1;
    }
    public static void display(int[] arr){
        System.out.println(Arrays.toString(arr));
    }
    public static void main(String[] args){
        int choice=0;
        long starttime,endtime,timetaken;
        int[] array1=new int[10000];
        int[] array2=new int[10000];
        Random random=new Random();
        for(int i=0;i<10000;i++){
            array1[i]=random.nextInt(10000)+1;
            array2[i]=i+1;
        }
        do{
            System.out.println("1.LinearSearch"); 
            System.out.println("2.BinarySearch"); 
            System.out.println("3.Exit"); 
            System.out.println("Enter Choice:");
            Scanner scanner=new Scanner(System.in);
            choice=scanner.nextInt();
            switch(choice){
                case 1:
                    System.out.println("LinearSearch:"); 
                    System.out.println("Enter Element to search in array:"); 
                    display(array1);
                    int x=scanner.nextInt();
                    starttime=System.nanoTime();
                    int ans=linearsearch(array1,x);
                    endtime=System.nanoTime();
                    timetaken=(endtime-starttime);
                    if(ans==-1)
                    System.out.println(x+" is not in array");
                    else
                    System.out.println(x+" is at "+ans+" index in array");
                    System.out.println("Time Taken for searching:"+timetaken+" ns");
                    System.out.println("-----------------------------------------------------------------------");
                    break;
                case 2:
                    System.out.println("BinarySearch:"); 
                    System.out.println("Enter Element to search in array:"); 
                    display(array2);
                    int x2=scanner.nextInt();
                    starttime=System.nanoTime();
                    int ans2=binarysearch(array2,x2);
                    endtime=System.nanoTime();
                    timetaken=(endtime-starttime);
                    if(ans2==-1)
                    System.out.println(x2+" is not in array");
                    else
                    System.out.println(x2+" is at "+ans2+" index in array");
                    System.out.println("Time Taken for searching:"+timetaken+" ns");
                    System.out.println("-----------------------------------------------------------------------");
                    break;
                case 3:
                    break;
            }
        }while(choice<3);
    }
}
