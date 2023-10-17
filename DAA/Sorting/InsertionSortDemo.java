class InsertionSortDemo{
    public static void insert(int[] arr,int start,int end){
        for(int i=start;i>0;i--){
            if(arr[i]<arr[i-1]){
                int temp=arr[i];
                arr[i]=arr[i-1];
                arr[i-1]=temp;
            }else break;
        }
    }
    public static void insertionSort(int[] arr){
        for(int i=1;i<arr.length;i++){
            if(arr[i]<arr[i-1]){
                insert(arr,i,0);
            }
        }
    }
    public static void main(String[] args){
        int[] arr={34,21,344,123,223,1,35,46};
        insertionSort(arr);
        for(int i:arr){
            System.out.print(i+" ");
        }
    }
}