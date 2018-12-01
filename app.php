<?php
require 'loader.php';
class MellowBot
{
	public $result, $main, $translate, $speech, $wikipedia;

	public function __construct() {
        $this->main = new Main;
        $this->translate = new Google_Translate();
        $this->speech = new Speech();
        $this->wikipedia = new Wikipedia();
    }

	public function text($ask) {
		$result = $this->translate($ask);
		$result = $this->wikipedia($ask);
		$result = $this->say($ask);
		$result = $this->math($ask);
		$result = $this->dates($ask);
		$result = $this->textcase($ask);
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

	public function wikipedia($ask){
		if($this->main->split_text($ask, 0) == "what" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->result = $this->wikipedia->get_information();
		}

		if($this->main->split_text($ask, 0) == "who" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->result = $this->wikipedia->get_information();
		}

		if($this->main->split_text($ask, 0) == "where" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->result = $this->wikipedia->get_information();
		}
	}

	public function say($ask) {
		if($this->main->split_text($ask, 0) == "say") {
			$word = $this->main->get_text($ask);
    		$this->speech->say($this->main->split_text($ask, 1),$word);
		}
	}

	public function textcase($ask) {
		if($this->main->split_text($ask, 0) == "uppercase") {
			$word = $this->main->get_word($ask);
    		$this->result = trim(strtoupper($word));
		}

		if($this->main->split_text($ask, 0) == "lowercase") {
			$word = $this->main->get_word($ask);
    		$this->result = trim(strtolower($word));
		}
	}

	public function math($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = $this->main->split_text($ask, 0);
		if($this->translate->translate() == "result" or $this->translate->translate() == "results" or $this->translate->translate() == "the results") {
			$expression = $this->main->get_number($ask);
		    return eval("echo $expression;");
		}
	}

	public function dates($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = $ask;
		if($this->translate->translate() == "current date") {
		    $this->result = date("d/m/Y");
		}

		if($this->translate->translate() == "tomorrow's date" or $ask == "tomorrow date") {
		    $this->result = $this->main->date_tomorrow('d/m/Y');
		}
	}
}




