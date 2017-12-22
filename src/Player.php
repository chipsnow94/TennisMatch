<?php

class Player
{
    public $name;
    public $score;
    public function __construct($name, $score)
    {
        $this->name =$name;
        $this->score = $score;
    }

    public function getscore($score)
    {
        // if ($score < 0) {
        //     # code...
        //     throw new InvalidArgumentException;
        // }
        $this->score= $score;
    }
}
