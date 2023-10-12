package Searching;

public class BinarySearch {
    public static void main(String[] args) {
        int[] arr = new int[10000];
        for (int i = 0; i < arr.length; i++) {
            arr[i] = i + 1;
        }

        // Best Case
        // Time Complexity:O(1)
        System.out.println("Best Case:");
        int element = 5000;
        long startTime = System.nanoTime();
        int ans = binary(arr, element);
        long endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");

        // Worst Case
        // Time Complexity:O(logN)
        System.out.println("Worst Case");
        element = -2;
        startTime = System.nanoTime();
        ans = binary(arr, element);
        endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");

        // Average Case
        // Time Complexity:O(LogN)
        System.out.println("Average Case:");
        int max = 10000, min = 1;
        element = (int) Math.floor(Math.random() * (max - min + 1) + min);
        startTime = System.nanoTime();
        ans = binary(arr, element);
        endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");
    }

    static int binary(int[] arr, int target) {
        int index = -1;
        int start = 0;
        int end = arr.length;
        while (start <= end) {
            int mid = (start) + (end - start) / 2;

            if (arr[mid] > target) {
                end = mid - 1;
            } else if (arr[mid] < target) {
                start = mid + 1;
            } else {
                index = mid;
                return index;
            }
        }
        return index;
    }
}