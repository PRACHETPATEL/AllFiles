import java.util.Arrays;
public class HeapDemo {
    public void sort(int[] arr){
        //max heap creation
        for(int i=arr.length/2-1;i>=0;i--){
            heapify(arr,arr.length,i);
        }
        //
        for(int i=arr.length-1;i>=0;i--){
            int temp=arr[0];
            arr[0]=arr[i];
            arr[i]=temp;
            heapify(arr,i,0);
        }
    }
    public void heapify(int[] arr, int n, int i){
        int largest=i;
        int left=2*i+1;
        int right=2*i+2;
        if(left<n&&arr[left]>arr[largest]){
            largest=left;
        }
        if(right<n&&arr[right]>arr[largest]){
            largest=right;
        }
        if(largest!=i){
            int temp=arr[i];
            arr[i]=arr[largest];
            arr[largest]=temp;
            heapify(arr,n,largest);
        }
    }
    public static void display(int[] arr){
        System.out.println(Arrays.toString(arr));
    }
    public static void main(String[] args) {
        int[] array={11,2,32,4,5,6,7,8,3,1};
        HeapDemo heapDemo=new HeapDemo();
        heapDemo.sort(array);
        display(array);
    }
}