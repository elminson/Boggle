<?php
/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/29/2018
 * Time: 8:45 AM
 */

namespace BoggleGame;

class Boggle extends TrackTime
{
    public $boggle;
    public $boggle_size;
    public $found;
    public $debug_time;
    protected $original_word;

    function __construct()
    {
        $this->found = false;
        $this->debug_time = false;
    }

    /**
     * @param bool $debug show track time if is set to true (default is false)
     */
    public function show_track_time(bool $debug)
    {
        $this->debug_time = $debug;
    }

    /**
     * @param array $boggle
     */
    public function set_board(array $boggle)
    {
        if ($this->debug_time) {
            $this->start_track_time();
        }
        $this->boggle = array_map("str_split", array_map("strtolower", $boggle));
        $this->boggle_size = count($this->boggle);
    }

    /**
     * @return bool Validate if the size is a square
     */
    public function is_size_valid()
    {
        foreach ($this->boggle as $key => $value) {
            if (count($value) != $this->boggle_size) {
                return false;
            }
        }
        return true;
    }

    /**
     * @param $word
     * @return \Exception
     */
    public function search_word(String $word)
    {
      try {
          $this->found = false;
          $this->original_word = $word;
          if (!$this->is_size_valid()) {
              throw new \Error("The matrix is not a square!");
          }

          if ($word == "") {
              throw new \InvalidArgumentException("Entry can't be null or empty");
          }

          $this->find_word($this->boggle, $this->boggle, "");
          if ($this->debug_time) {
              $this->end_track_time();
          }
      } catch (\Exception $e){
          throw new \InvalidArgumentException("Entry can't be null or empty");
      }
    }

    /**
     * @return mixed
     */
    public function getOriginalWord()
    {
        return $this->original_word;
    }

    /**
     * @param mixed $original_word
     */
    public function setOriginalWord($original_word)
    {
        $this->original_word = $original_word;
    }

     /**
     * @param array $board is the original boardd after is passed as $tmp copy with
     * elment x,y set to true
     * @param array $trackboard is a copy of the original board(the first time that run) an
     * @param String $word the fist time the method is execute pass empty and after the first time will concat with
     * the the letter in $board[$x + 1][$y] (depend in the position of x and y)
     * @param int $x first time will set to 0 y after will walk all the elements x
     * @param int $y first time will set to 0 y after will walk all the elements y
     * @return bool|void
     */
    public function find_word(
        array $board,
        array $trackboard,
        String $word,
        $x = 0,
        $y = 0
    ) {

        //if is the first time in the recursion assing the first letter from the grid
        if ($word == "") {
            $word = $board[0][0];
        }

        //if I found the word in the last recursion prevent continue looking return
        if ($this->found) {
            return;
        }

        //if word  is nor empty and the original word is inside of $word (and reversed) then I found the word
        //I figure that if the word is found backward eventually the recursion will found it so is less process time
        // if I return true when found backward
        $pos = strpos($word, $this->original_word);
        $pos_rev = strpos(strrev($word), $this->original_word);
        if ($word !== "" && ($pos || $pos_rev)) {
            $this->found = true;
            return;
        }

        $tmp_trackboard = $trackboard;
        $tmp_trackboard[$x][$y] = true;

        //$word . $board[$x + 1][$y] add a letter from the pile to the actual value in $word
        //check right element
        if ($x + 1 < count($board[0]) && ($tmp_trackboard[$x + 1][$y] !== true)) {
            $this->find_word($board, $tmp_trackboard, $word . $board[$x + 1][$y], $x + 1, $y);
        }

        //check down element
        if ($y + 1 < count($board[0]) && ($tmp_trackboard[$x][$y + 1] !== true)) {
            $this->find_word($board, $tmp_trackboard, $word . $board[$x][$y + 1], $x, $y + 1);
        }

        //check left element
        if (0 <= $x - 1 && ($tmp_trackboard[$x - 1][$y] !== true)) {
            $this->find_word($board, $tmp_trackboard, $word . $board[$x - 1][$y], $x - 1, $y);
        }

        //check up element
        if (0 <= $y - 1 && ($tmp_trackboard[$x][$y - 1] !== true)) {
            $this->find_word($board, $tmp_trackboard, $word . $board[$x][$y - 1], $x, $y - 1);
        }
    }
}