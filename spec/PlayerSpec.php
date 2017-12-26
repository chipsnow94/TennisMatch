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
    protected $name;
    protected $score;
    public function let()
    {
        $this->name = 'Player1';
        $this->score = 0;
        $this->beConstructedWith($this->name, $this->score);
    }
    public function it_invalid_number_exception()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid Number'))->duringSetScore(-1);
    }
    public function it_a_string_score()
    {
        $this->shouldThrow(new \InvalidArgumentException('Invalid Input-Must be a number'))->duringSetScore('a');
    }
}
