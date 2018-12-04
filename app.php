<?php
require 'loader.php';
class MellowBot
{
	private $customtext, $result, $main, $translate, $speech, $wikipedia, $blockchain;

	public function __construct() {
		$this->main = new Main;
		$this->translate = new Google_Translate();
		$this->speech = new Speech();
		$this->wikipedia = new Wikipedia();
		$this->blockchain = new Blockchain();
	}

	public function text($ask) {
		$this->customtext = $ask;
		$result = $this->say($ask);
		$result = $this->math($ask);
		$result = $this->date($ask);
		$result = $this->textcase($ask);
		$result = $this->translate($ask);
		$result = $this->wikipedia($ask);
		$result = $this->blockchain($ask);
		return $result;
	}

	public function response() {
		return $this->result."\n";
	}

	public function reply() {
		echo $this->result."\n";
	}

	public function json() {
		$data = array("status" => "200", "question" => $this->customtext, "reply" => $this->result);
		echo json_encode($data);
	}

	public function translate($ask){
		if($this->main->split_text(strtolower($ask), 0) == "translate") {
			$this->translate->from = $this->translate->country_name($this->main->split_text($ask, 1));
			$this->translate->to = $this->translate->country_name($this->main->split_text($ask, 3));
			$this->translate->word = $this->main->get_text_translate($ask);
			$this->result = $this->translate->translate();
		}
	}

	public function wikipedia($ask){
		if($this->main->split_text($ask, 0) == "what" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->wikipedia->get_information();
			$this->result = $this->wikipedia->result."\n\n".$this->wikipedia->source;
		}

		if($this->main->split_text($ask, 0) == "who" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->wikipedia->get_information();
			$this->result = $this->wikipedia->result."\n\n".$this->wikipedia->source;
		}

		if($this->main->split_text($ask, 0) == "where" and $this->main->split_text($ask, 1) == "is") {
			$this->wikipedia->search = $this->main->get_text($ask);
			$this->wikipedia->get_information();
			$this->result = $this->wikipedia->result."\n\n".$this->wikipedia->source;
		}
	}

	public function say($ask) {
		$ask = strtolower($ask);
		if($this->main->split_text($ask, 0) == "say") {
			$word = $this->main->get_text($ask);
    		$this->speech->say($this->main->split_text($ask, 1),$word);
		}
	}

	public function textcase($ask) {
		$ask = strtolower($ask);
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
		if($this->main->split_text($ask, 0) == "math") {
			$expression = $this->main->get_number($ask);
		    return eval("echo $expression;");
		}
	}

	public function date($ask) {
		$this->translate->from = "auto";
		$this->translate->to = "en";
		$this->translate->word = strtolower($ask);

		if($this->translate->translate() == "current date" or $ask == "current date") {
		    $this->result = date("d/m/Y");
		}
		if($this->translate->translate() == "tomorrow's date" or $ask == "tomorrow's date" or $ask == "tomorrow date") {
		    $this->result = $this->main->date_tomorrow('d/m/Y');
		}
	}

	public function blockchain($ask){
		$ask = str_replace("$", "usd", $ask);
		if(preg_match('/usd/', $this->main->split_text($ask, 0)) and preg_match('/btc/', strtolower($ask))) {
			$ask = str_replace("usd", "", $ask);
			$this->blockchain->currency = "USD";
			$this->blockchain->value = $this->main->split_text($ask, 0);
			$this->result = $this->blockchain->convert();
		}
	}

	public function customReply($pattern, $reply){
		if(preg_match("/".strtolower(trim($pattern))."/", strtolower(trim($this->customtext)))) {
			$this->result = $reply;
		}
	}
}




