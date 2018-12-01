<?php
class MellowBot
{
	public $result, $main, $translate, $speech;

	public function __construct() {
        $this->main = new Main;
        $this->translate = new Google_Translate();
        $this->speech = new speech;
    }

	public function text($ask) {
		$result = $this->translate($ask);
		$result = $this->say($ask);
		$result = $this->math($ask);
		$result = $this->current_date($ask);
		$result = $this->tomorrow_date($ask);
		return $result;
	}

	public function response() {
		echo $this->result."\n";
	}

	public function translate($ask){
		if($this->main->split_text($ask, 0) == "translate") {
			$this->translate->from = $this->translate->country_name($this->main->split_text($ask, 1));
			$this->translate->to = $this->translate->country_name($this->main->split_text($ask, 3));
			$this->translate->word = $this->main->get_text_translate($ask);
			$this->result = $this->translate->translate();
		}
	}

	public function say($ask) {
		if($this->main->split_text($ask, 0) == "say") {
			$word = $this->main->get_text($ask);
    		$this->speech->say($this->main->split_text($ask, 1),$word);
		}
	}

	public function math($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = $this->main->split_text($ask, 0);
		if($this->main->split_text($ask, 0) == "math" or $this->main->split_text($ask, 0) == "result" or $this->translate->translate() == "the results") {
			$expression = $this->main->get_number($ask);
		    return eval("echo $expression;");
		}
	}

	public function current_date($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = $ask;
		if($this->translate->translate() == "current date" or $this->translate->translate() == "today") {
		    $this->result = date("d/m/Y");
		}
	}

	public function tomorrow_date($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = $ask;
		if($this->translate->translate() == "tomorrow date" or $this->translate->translate() == "tomorrow's date") {
		    $this->result = $this->main->date_tomorrow('d/m/Y');
		}
	}
}




