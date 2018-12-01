<?php
class Wikipedia
{
    public $search;

    /*
    this function for request to search wikipedia
     */
    public function get_information() {
        $url = "https://en.wikipedia.org/w/api.php?action=opensearch&search=".urlencode($this->search)."&limit=1&format=json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);
        return $result[2][0];
    }
}