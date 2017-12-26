<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Player;

class PlayerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Player');
    }
    protected $Player1;
    protected $Player2;
    public function let()
    {
        $this->Player1= new Player('Player1', 0);
        $this->Player2 = new Player('Player2', 0);
        $this->beConstructedWith($this->Player1, $this->Player2);
    }
    public function it_invalid_number_exception()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid Number'))->duringSetScore(-1);
    }
    public function it_a_string_score()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid Number-Must be a string'))->duringSetScore('a');
    }
}
