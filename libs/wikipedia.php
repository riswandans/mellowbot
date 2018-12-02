<?php
class Wikipedia
{
    public $search, $result, $source;

    /*
    this function for request to search wikipedia
     */
    public function get_information() {
        $url = "https://en.wikipedia.org/w/api.php?action=opensearch&search=".urlencode($this->search)."&limit=1&format=json";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);
        $this->result = $result[2][0];
        $this->source = $result[3][0];
    }
}