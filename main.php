<?php
class MellowBot
{
	public function translate($ask){
		$main = new Main();
		$speech = new Speech();
		$translate = new Google_Translate();
		$translate->from = $translate->country_name($main->split_text($ask, 1));
		$translate->to = $translate->country_name($main->split_text($ask, 3));
		$translate->word = $main->get_text_translate($ask);
		$main->reply($translate->translate());
		$speech->say($main->split_text($ask, 3),$translate->translate());
	}
}




