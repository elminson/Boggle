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

//Test entries
$search_items = ["arty", "tony", "notice", "year", "stand", "party", "stick"];
try {
    $newGame = new Boggle();
    $newGame->set_board($row);
    $newGame->show_track_time(true);
    foreach ($search_items as $item) {
        $newGame->search_word($item);
        if ($newGame->found) {
            print_r($item . " => true\n");
        } else {
            print_r($item . " => false\n");
        }
    }
} catch (\Exception $e) {
    echo $e->getMessage();
} catch (\Error $e) {
    echo $e->getMessage();
}


//End Test entries
//arty => true
//tony => true
//notice => true
//year => true
//stand => false
//party => false
//stick => false