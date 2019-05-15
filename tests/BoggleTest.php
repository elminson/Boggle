<?php
/**
 * Created by edeoleo@gmail.com.
 * User: Elminson De Oleo Baez
 * Date: 6/29/2018
 * Time: 9:17 AM
 */

namespace BoggleGame;

require __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use BoggleGame\Boggle;


class BoggleTest extends TestCase
{
    protected $row_square;
    protected $row_not_square;

    function __construct(String $name = null, array $data = [], String $dataName = null)
    {
        parent::__construct($name, $data, $dataName);
        $row_data[] = "ARTY";
        $row_data[] = "EAON";
        $row_data[] = "YSTD";
        $row_data[] = "ECIC";
        $this->row_square = $row_data;
        $row_data[] = "ECIC";
        $this->row_not_square = $row_data;
    }

    public function testIs_size_valid_True()
    {
        $newGame = new Boggle();
        $newGame->set_board($this->row_square);
        $this->assertTrue($newGame->is_size_valid());
    }

    public function testIs_size_valid_False()
    {
        $newGame = new Boggle();
        $newGame->set_board($this->row_not_square);
        $this->assertFalse($newGame->is_size_valid());
    }

    public function testFind_word_true()
    {
        //  $boogle = array_map("str_split", array_map("strtolower", $this->row_square));
        $newGame = new Boggle();
        $newGame->set_board($this->row_square);
        $newGame->setOriginalWord("tony");
        $newGame->find_word($newGame->boggle, $newGame->boggle, "tony");
        $this->assertTrue($newGame->found);
    }

    public function testFind_word_false()
    {
        $newGame = new Boggle();
        $newGame->set_board($this->row_square);
        $newGame->find_word($newGame->boggle, $newGame->boggle, "notfound");
        $this->assertFalse($newGame->found);
    }

    public function testSearch_word_found()
    {
        $newGame = new Boggle();
        $newGame->set_board($this->row_square);
        $newGame->search_word("tony");
        $this->assertTrue($newGame->found);
    }

    public function testSearch_word_not_found()
    {
        $newGame = new Boggle();
        $newGame->set_board($this->row_square);
        $newGame->search_word("notfound");
        $this->assertFalse($newGame->found);
    }
}
