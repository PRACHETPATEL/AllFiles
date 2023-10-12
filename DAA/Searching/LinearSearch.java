package Searching;

class LinearSearch {
    public static void main(String[] args) {
        int[] arr = new int[10000];
        for (int i = 0; i < arr.length; i++) {
            arr[i] = i + 1;
        }

        // Best Case
        // Time Complexity:O(1)
        System.out.println("Best Case:");
        int element = 1;
        long startTime = System.nanoTime();
        int ans = linear(arr, element);
        long endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");

        // Worst Case
        // Time Complexity:O(N)
        System.out.println("Worst Case");
        element = -2;
        startTime = System.nanoTime();
        ans = linear(arr, element);
        endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");

        // Average Case
        // Time Complexity:O(N)
        System.out.println("Average Case:");
        int max = 10000, min = 1;
        element = (int) Math.floor(Math.random() * (max - min + 1) + min);
        startTime = System.nanoTime();
        ans = linear(arr, element);
        endTime = System.nanoTime();
        if (ans == -1) {
            System.out.println("Element " + element + " not found");
        } else {
            System.out.println("Element " + element + " is present at: " + ans);
        }
        System.out.println("Execution Time: " + (endTime - startTime) + " ns");
        System.out.println("***********************************************");
    }

    static int linear(int[] arr, int target) {
        int index = -1;
        for (int i = 0; i < arr.length; i++) {
            if (arr[i] == target) {
                index = arr[i];
                return index;
            }
        }
        return index;
    }
}