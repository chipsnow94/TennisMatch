<?php

class Player
{
    public $name;
    public $score;
    public function __construct($name, $score)
    {
        $this->name =$name;
        $this->Check_Exception($score);
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
        $this->Check_Exception($score);
        $this->score= $score;
    }
    private function Check_Exception($score)
    {
        if ($score < 0 || $score >100) {
            # code...
            throw new InvalidArgumentException('Invalid Number');
        }
        if (!is_int($score)) {
            # code...
            throw new InvalidArgumentException('Invalid Input-Must be a number');
        }
    }
}
