
public class PerformanceTester {

    public static long runPerformanceTest(Runnable codeBlock) {
        int numIterations = 10;
        long totalTime = 0;
        //warm up round
        for (int i = 0; i < 10; i++) {
            codeBlock.run();
        }

        for (int i = 0; i < numIterations; i++) {
            long startTime = System.nanoTime();
            codeBlock.run();
            long endTime = System.nanoTime();
            totalTime += endTime - startTime;
        }

        return totalTime;

    }

}
