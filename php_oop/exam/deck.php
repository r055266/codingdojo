<?php

class Deck {

	var $deck = array();
	var $card_value;

	private function color()
	{
		$color = array(black,red);

		$this->deck['color'] = $color[rand(0,1)];
	}

	private function suit()
	{
		$suit = array(Clubs, Hearts, Spades, Diamonds);

		$this->deck['suit'] = $suit[rand(0, count($suit)-1)];
	}

	private function card()
	{
		for($i = 1; $i<15; $i++)
		{
			switch($i)
			{
				case 11:
					$card[] = 'Jack';
				break;
				case 12:
					$card[] = 'Queen';
				break;
				case 13:
					$card[] = 'King';
				break;
				case 14:
					$card[] = 'Ace';
				break;
				default;
					$card[] = $i;
				break;
			}
		}

		$this->card_value = rand(0,count($card)-1);

		$this->deck['card'] = $card[$this->card_value];


	}

	function draw_card()
	{
		$this->color();
		$this->suit();
		$this->card();

		return $this->card_value;
	}

	function display_card()
	{

		return '<span class="'.$this->deck['color'].'">'.$this->deck['card'] . ' of ' . $this->deck['suit'].'</span>';
	}

	function display_winner($you, $computer)
	{
		if($you == $computer)
		{
			$display = 'YOU TIED. MEH';
		}
		else if($you > $computer)
		{
			$display = 'YOU WON! AWESOME!';
		}
		else
		{
			$display = 'YOU LOST. SORRY CHAMP';
		}

		return $display;
	}
}

?>