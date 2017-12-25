<?php
class Tennis
{
    protected $player1;
    protected $player2;
    protected $result;
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
        if ($this->ValidNumber()) {
            // Win for
        }
        if ($this->hasAWinner()) {
            # code...
            $result ='Win for '.$this->winner()->name;
            return $result;
        }
        if ($this->hasAdvantage()) {
            $result ='Advantage for '.$this->winner()->name;
            return $result;
        }
        if ($this->isDeuce()) {
            # code...
            $result ='Deuce';
            return $result;
        }
        $score = $this->lookup[$this->player1->score]. '-'.$this->lookup[$this->player2->score];
        return $score;

        // if ($this->player1->score== 1 && $this->player2->score==0) {
        //     return('Fifteen-Love');
        // }
        // if ($this->player1->score== 2 && $this->player2->score==0) {
        //     return('Thirty-Love');
       // }
    }
    private function ValidNumber()
    {
        if (!is_numeric($this->player1->score) || is_numeric($this->player2->score)) {
            $result= 'Invalid Number';
            return $result;
        }
    }
    private function isDeuce()
    {//check Deuce  (Totol scores >6 and players score equal)
        $result =($this->player1->score + $this->player2->score >=6) && $this->equalScore();
        return $result;
    }
    private function equalScore()
    {//check players Equalscore
        $result =$this->player1->score == $this->player2->score;
        return $result;
    }
    private function hasAdvantage()
    {//check Advantage
        $result =($this->hasEnoughscoretoWin()) && (($this->player1->score - $this->player2->score) ==1 ||($this->player2->score - $this->player1->score)==1);
        return $result;
    }
    private function hasAWinner()
    {//check winner
        $result =($this->hasEnoughscoretoWin()) && ($this->hasmorethan2point());
        return $result;
    }
    private function winner()
    {//check score winner
        $result = $this->player1->score > $this->player2->score ? $this->player1 : $this->player2;
        return $result;
    }
    private function hasEnoughscoretoWin()
    {//check winner scores to win
        $result =($this->player1->score - $this->player2->score) >= 4 ||($this->player2->score - $this->player1->score)>=4;
        return $result;
    }
    private function hasmorethan2point()
    {//check condition players score need to win than 2 point.
        $result = ($this->player1->score - $this->player2->score) >= 2 || ($this->player2->score - $this->player1->score) >=2;
        return $result;
    }
}
