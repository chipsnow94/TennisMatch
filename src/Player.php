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
    public function getName()
    {
        return $this->name;
    }
    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        if ($score < 0) {
            # code...
            throw new InvalidArgumentException('Invalid Number');
        }
        if (!is_numeric($score)) {
            # code...
            throw new InvalidArgumentException('Invalid Number-Must be a string');
        }
        $this->score= $score;
    }
}
