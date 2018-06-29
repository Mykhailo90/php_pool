<?php

class UnholyFactory{

	public $absorbed = array();

	public function absorb($input)
	{
		if ($input->fighter_type)
		{
			if (in_array($input, $this->absorbed))
			{
				print("(Factory already absorbed a fighter of type " . $input->fighter_type . ")" . PHP_EOL);
			}
			else
			{
				$this->absorbed[] = $input;
				print("(Factory absorbed a fighter of type " . $input->fighter_type . ")" . PHP_EOL);
			}
		}
		else
		{
			print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
		}
	}

	public function fabricate($rf)
	{
		foreach ($this->absorbed as $value)
		{
			if ($rf == $value->fighter_type)
			{
				print("(Factory fabricates a fighter of type " . $value->fighter_type . ")" . PHP_EOL);
				return $value;
			}
		}
		print("(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL);
		return NULL;
	}
}
?>
