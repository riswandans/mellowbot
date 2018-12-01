<?php
class Speech
{
	public function say($type, $msg){
		$type = str_replace("arabic","Maged",$type);
		$type = str_replace("indonesian","Damayanti",$type);
		$type = str_replace("english","Alex",$type);
		$type = str_replace("british","Daniel",$type);
		$type = str_replace("italian","Alice",$type);
		$type = str_replace("swedish","Alva",$type);
		$type = str_replace("french","Amelie",$type);
		$type = str_replace("german","Anna",$type);
		$type = str_replace("spanish","Jorge",$type);
		$type = str_replace("romanian","Ioana",$type);
		$type = str_replace("portuguese","Joana",$type);
		$type = str_replace("thai","Kanya",$type);
		$type = str_replace("japanese","Kyoko",$type);
		$type = str_replace("slovak","Laura",$type);
		$type = str_replace("hindi","Lekha",$type);
		$type = str_replace("hungarian","Mariska",$type);
		$type = str_replace("chinese","Ting-Ting",$type);
		$type = str_replace("taiwan","Mei-Jia",$type);
		$type = str_replace("russian","Milena",$type);
		$type = str_replace("finnish","Satu",$type);
		$type = str_replace("dutch","Xander",$type);
		$type = str_replace("turkish","Yelda",$type);
		$type = str_replace("korean","Yuna",$type);
		$type = str_replace("polish","Zosia",$type);
		$type = str_replace("czech","Zuzana",$type);
        system("say -v $type $msg");
	}
}