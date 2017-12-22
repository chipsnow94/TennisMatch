<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Player;

class TennisSpec extends ObjectBehavior
{
    protected $Vinh;
    protected $Tien;
    public function let()
    {
        $this->Vinh= new Player('Vinh', 0);
        $this->Tien = new Player('Tien', 0);
        $this->beConstructedWith($this->Vinh, $this->Tien);
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
        $this->Vinh->getscore(1);
        $this->score()->shouldReturn("Fifteen-Love");
    }
    public function its_score_1_1()
    {//first player get 1 score and player 2 get 1 score
        $this->Vinh->getscore(1);
        $this->Tien->getscore(1);
        $this->score()->shouldReturn("Fifteen-Fifteen");
    }
    public function its_score_2_0()
    {//first player get 2 score - player2 get 0
        $this->Vinh->getscore(2);
        $this->score()->shouldReturn("Thirty-Love");
    }
    public function its_score_2_1()
    {//first player get 2 score - player2 get 1
        $this->Vinh->getscore(2);
        $this->Tien->getscore(1);
        $this->score()->shouldReturn("Thirty-Fifteen");
    }
    public function its_score_2_2()
    {//first player get 2 score - player2 get 2
        $this->Vinh->getscore(2);
        $this->Tien->getscore(2);

        $this->score()->shouldReturn("Thirty-Thirty");
    }
    public function its_score_3_0()
    {//first player get 3 score - player2 get 0

        $this->Vinh->getscore(3);
        $this->score()->shouldReturn("Fourty-Love");
    }
    public function its_score_4_0()
    {//first player get 4 score - player2 get 0 Player1 win

        $this->Vinh->getscore(4);
        $this->score()->shouldReturn("Win for Vinh");
    }
    public function its_score_0_4()
    {//first player get 0 score - player2 get 4 Player2 win

        $this->Tien->getscore(4);
        $this->score()->shouldReturn("Win for Tien");
    }
    public function its_score_6_4()
    {
        $this->Vinh->getscore(6);
        $this->Tien->getscore(4);
        $this->score()->shouldReturn("Win for Vinh");
    }
    
    public function its_score_4_3_Advantage_for_player1()
    {//get normal Advantage
        $this->Vinh->getscore(4);
        $this->Tien->getscore(3);
        $this->score()->shouldReturn("Advantage for Vinh");
    }
    public function its_score_5_6_Advantage_for_player2()
    {//get Advantage with more than 4 score !
        $this->Vinh->getscore(5);
        $this->Tien->getscore(6);
        $this->score()->shouldReturn("Advantage for Tien");
    }
    public function its_score_3_3()
    {// Deuce 3-3 Score
        $this->Vinh->getscore(3);
        $this->Tien->getscore(3);

        $this->score()->shouldReturn("Deuce");
    }

    public function its_score_7_7()
    {// Deuce 7-7 Score

        $this->Vinh->getscore(7);
        $this->Tien->getscore(7);
        $this->score()->shouldReturn("Deuce");
    }

    //NOT FINISH ////
    // public function its_takes_exception_with_invalid_score()
    // {
    //     $this->shouldThrow('InvalidArgumentException')->during($this->Vinh->getscore(-1));
    // }
}
