<?php
class Tennis
{
    protected $player1;
    protected $player2;
    private $result;
    protected $lookup=[
        0 => "Love",
        1 => "Fifteen",
        2 => "Thirty",
        3 => "Fourty"
    ];
    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    public function score()
    {
        // Win for
        if ($this->hasAWinner()) {
            # code...
            $result='Win for '. $this->winner()->name;
            return $result;
        }
        if ($this->hasAdvantage()) {
            $result='Advantage for '.$this->winner()->name;
            return $result;
        }
        if ($this->isDeuce()) {
            # code...
            $result='Deuce';
            return $result;
        }
        return $score = $this->lookup[$this->player1->score]. '-'.$this->lookup[$this->player2->score];
    }
    private function isDeuce()
    {//check Deuce  (Totol scores >6 and players score equal)
        return ($this->player1->score + $this->player2->score >=6) && $this->equalScore();
    }
    private function equalScore()
    {//check players Equalscore
        return $this->player1->score == $this->player2->score;
    }
    private function hasAdvantage()
    {//check Advantage
        return ($this->hasEnoughscoretoWin()) && (abs($this->player1->score - $this->player2->score) ==1);
    }
    private function hasAWinner()
    {//check winner
        return ($this->hasEnoughscoretoWin()) && ($this->hasmorethan2point());
    }
    private function winner()
    {//check score winner
        return $this->player1->score > $this->player2->score ? $this->player1 : $this->player2;
    }
    private function hasEnoughscoretoWin()
    {//check winner scores to win
        return max([$this->player1->score,$this->player2->score]) >= 4;
    }
    private function hasmorethan2point()
    {//check condition players score need to win than 2 point.
        return abs($this->player1->score - $this->player2->score) >= 2;
    }
}
