<?php
/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/29/2018
 * Time: 8:50 AM
 */

namespace BoggleGame;

require __DIR__ . '/vendor/autoload.php';
$row[] = "ARTY";
$row[] = "EAON";
$row[] = "YSTD";
$row[] = "ECIC";

try {
    $newGame = new Boggle();
    $newGame->show_track_time(false);
    $newGame->set_board($row);
    if (isset($argv[1])) {
        $newGame->search_word($argv[1]);
        if ($newGame->found) {
            print_r("true\n");
        } else {
            print_r("false\n");
        }
    }
} catch (\TypeError $e) {
    echo $e->getMessage();
} catch (\Error $e) {
    echo $e->getMessage();
}catch (\InvalidArgumentException $e) {
    echo $e->getMessage();
}

//arty => true
//tony => true
//notice => true
//year => true
//stand => false
//party => false
//stick => false