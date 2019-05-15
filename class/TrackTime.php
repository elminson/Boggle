<?php
/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/29/2018
 * Time: 8:52 AM
 */

namespace BoggleGame;

class TrackTime
{

    /**
     * Output start time, current memory and peak memory
     */
    public function start_track_time()
    {
        $startTime = microtime(true);
        $endTime = microtime(true);
        $callTime = $endTime - $startTime;
        echo PHP_EOL . 'Start Time: ', sprintf('%.4f', $callTime), ' s', PHP_EOL;
        echo 'Memory: ', sprintf('%.2f', (memory_get_usage(false) / 1024)), ' k', PHP_EOL;
        echo 'Peak Memory: ', sprintf('%.2f', (memory_get_peak_usage(false) / 1024)), ' k', PHP_EOL, PHP_EOL;

    }

    /**
     * Output total time searching, current memory and peak memory
     */
    public function end_track_time()
    {
        $startTime = microtime(true);
        $endTime = microtime(true);
        $callTime = $endTime - $startTime;
        echo PHP_EOL . 'End Time: ', sprintf('%.4f', $callTime), ' s', PHP_EOL;
        echo 'Memory: ', sprintf('%.2f', (memory_get_usage(false) / 1024)), ' k', PHP_EOL;
        echo 'Peak Memory: ', sprintf('%.2f', (memory_get_peak_usage(false) / 1024)), ' k', PHP_EOL;
    }
}