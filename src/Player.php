<?php

class Player
{
    public $name;
    public $score;
    const MIN_SCORE=0;
    const MAX_SCORE=100;
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
        if ($score < self::MIN_SCORE || $score >self::MAX_SCORE) {
            # code...
            throw new InvalidArgumentException('Invalid Number');
        }
        if (!is_int($score)) {
            # code...
            throw new InvalidArgumentException('Invalid Input-Must be a number');
        }
    }
}
