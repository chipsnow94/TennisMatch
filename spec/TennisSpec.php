<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Player;

class TennisSpec extends ObjectBehavior
{
    protected $Player1;
    protected $Player2;
    public function let()
    {
        $this->Player1= new Player('Player1', 0);
        $this->Player2 = new Player('Player2', 0);
        $this->beConstructedWith($this->Player1, $this->Player2);
    }
    public function it_is_initializable()
    {
        $this->shouldHaveType('Tennis');
    }
    public function its_begin_with_0_0()
    {// check begin score;
        $this->score()->shouldReturn("Love-Love");
    }
    public function its_score_1_0()
    {//first player get 1 score - player2 get 0
        $this->Player1->setScore(1);
        $this->score()->shouldReturn("Fifteen-Love");
    }
    public function its_score_1_1()
    {//first player get 1 score and player 2 get 1 score
        $this->Player1->setScore(1);
        $this->Player2->setScore(1);
        $this->score()->shouldReturn("Fifteen-Fifteen");
    }
    public function its_score_2_0()
    {//first player get 2 score - player2 get 0
        $this->Player1->setScore(2);
        $this->score()->shouldReturn("Thirty-Love");
    }
    public function its_score_2_1()
    {//first player get 2 score - player2 get 1
        $this->Player1->setScore(2);
        $this->Player2->setScore(1);
        $this->score()->shouldReturn("Thirty-Fifteen");
    }
    public function its_score_2_2()
    {//first player get 2 score - player2 get 2
        $this->Player1->setScore(2);
        $this->Player2->setScore(2);

        $this->score()->shouldReturn("Thirty-Thirty");
    }
    public function its_score_3_0()
    {//first player get 3 score - player2 get 0

        $this->Player1->setScore(3);
        $this->score()->shouldReturn("Fourty-Love");
    }
    public function its_score_4_0()
    {//first player get 4 score - player2 get 0 Player1 win

        $this->Player1->setScore(4);
        $this->score()->shouldReturn("Win for Player1");
    }
    public function its_score_0_4()
    {//first player get 0 score - player2 get 4 Player2 win

        $this->Player2->setScore(4);
        $this->score()->shouldReturn("Win for Player2");
    }
    public function its_score_6_4()
    {
        $this->Player1->setScore(6);
        $this->Player2->setScore(4);
        $this->score()->shouldReturn("Win for Player1");
    }
    
    public function its_score_4_3_Advantage_for_player1()
    {//get normal Advantage
        $this->Player1->setScore(4);
        $this->Player2->setScore(3);
        $this->score()->shouldReturn("Advantage for Player1");
    }
    public function its_score_5_6_Advantage_for_player2()
    {//get Advantage with more than 4 score !
        $this->Player1->setScore(5);
        $this->Player2->setScore(6);
        $this->score()->shouldReturn("Advantage for Player2");
    }
    public function its_score_3_3()
    {// Deuce 3-3 Score
        $this->Player1->setScore(3);
        $this->Player2->setScore(3);

        $this->score()->shouldReturn("Deuce");
    }

    public function its_score_7_7()
    {// Deuce 7-7 Score

        $this->Player1->setScore(7);
        $this->Player2->setScore(7);
        $this->score()->shouldReturn("Deuce");
    }

    //NOT FINISH ////
    // public function its_takes_exception_with_invalid_score()
    // {
    //     $this->shouldThrow('InvalidArgumentException')->during($this->Player1->setScore(-1));
    // }
}
