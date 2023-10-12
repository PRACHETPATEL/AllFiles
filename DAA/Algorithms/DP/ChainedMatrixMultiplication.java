public class ChainedMatrixMultiplication {

    public static void main(String[] args) {
        int[] dimensions = {10, 30, 5, 60};

        int minMultiplications = matrixChainOrder(dimensions);

        System.out.println("Minimum number of multiplications required: " + minMultiplications);
    }

    public static int matrixChainOrder(int[] dimensions) {
        int n = dimensions.length - 1; 
        int[][] dp = new int[n][n];

        for (int len = 2; len <= n; len++) {
            for (int i = 0; i < n - len + 1; i++) {
                int j = i + len - 1;
                dp[i][j] = Integer.MAX_VALUE;

                for (int k = i; k < j; k++) {
                    int cost = dp[i][k] + dp[k + 1][j] + dimensions[i] * dimensions[k + 1] * dimensions[j + 1];
                    if (cost < dp[i][j]) {
                        dp[i][j] = cost;
                    }
                }
            }
        }

        return dp[0][n - 1];
    }
}
