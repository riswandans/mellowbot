<?php
class Main
{
    public function question($msg){
        echo $msg;
        return rtrim(fgets(STDIN));
    }

    public function reply($msg){
        echo $msg;
    }

    public function split_text($text, $where){
        $split = explode(" ", $text);
        return $split[$where];
    }

    public function get_text_translate($word) {
        $split = explode(" ", $word);
        $word = str_replace($split[0],"",$word);
        $word = str_replace($split[1],"",$word);
        $word = str_replace($split[2],"",$word);
        $word = str_replace($split[3],"",$word);
        return $word;
    }

    public function get_number($word) {
        $split = explode(" ", $word);
        $word = str_replace($split[0],"",$word);
        return $word;
    }

    public function get_text($word) {
        $split = explode(" ", $word);
        $word = str_replace($split[0],"",$word);
        $word = str_replace($split[1],"",$word);
        return $word;
    }

    public function date_tomorrow($format) {
        $datetime = new DateTime('tomorrow');
        return $datetime->format($format);
    }
}