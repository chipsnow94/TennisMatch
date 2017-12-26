<?php

class Player
{
    public $name;
    public $score;
    public function __construct($name, $score)
    {
        $this->name =$name;
        $this->Check_Exception();
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
        $this->Check_Exception();
        $this->score= $score;
    }
    private function Check_Exception($score)
    {
        if ($score < 0 || $score >100) {
            # code...
            throw new InvalidArgumentException('Invalid Number');
        }
        if (!is_numeric($score)) {
            # code...
            throw new InvalidArgumentException('Invalid Number-Must be a string');
        }
    }
}
