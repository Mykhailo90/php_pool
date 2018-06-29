<?php 
class NightsWatch
{
	public $lol = array();
	public function recruit($kek)
	{
		$this->lol[] = $kek;
	}
	function fight()
	{
		foreach ($this->lol as $value) 
		{
			if(method_exists($value, "fight"))
				$value->fight();
		}
	}
}