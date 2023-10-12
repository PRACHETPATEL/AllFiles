public class FloydAlgorithm {

    public static void main(String[] args) {
        int INF = 99999;
        int[][] graph = {
                {0, 15, INF, 12},
                {INF, 20, 3, INF},
                {INF, 50, 1, 0},
                {INF, INF, INF, 19}
        };

        int[][] shortestDistances = floydWarshall(graph);

        System.out.println("Shortest distances between every pair of vertices:");
        for (int i = 0; i < shortestDistances.length; i++) {
            for (int j = 0; j < shortestDistances.length; j++) {
                if (shortestDistances[i][j] == INF) {
                    System.out.print("INF\t");
                } else {
                    System.out.print(shortestDistances[i][j] + "\t");
                }
            }
            System.out.println();
        }
    }

    public static int[][] floydWarshall(int[][] graph) {
        int V = graph.length;
        int[][] dist = new int[V][V];

        for (int i = 0; i < V; i++) {
            for (int j = 0; j < V; j++) {
                dist[i][j] = graph[i][j];
            }
        }

        for (int k = 0; k < V; k++) {
            for (int i = 0; i < V; i++) {
                for (int j = 0; j < V; j++) {
                    if (dist[i][k] != Integer.MAX_VALUE && dist[k][j] != Integer.MAX_VALUE &&
                        dist[i][k] + dist[k][j] < dist[i][j]) {
                        dist[i][j] = dist[i][k] + dist[k][j];
                    }
                }
            }
        }

        return dist;
    }
}
