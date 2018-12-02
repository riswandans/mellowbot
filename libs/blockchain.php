<?php
class Blockchain
{
    public $currency, $value;

    /*
    this function for request to convert usd to btc 
     */
    public function convert() {
        $url = "https://blockchain.info/tobtc?currency=".$this->currency."&value=".$this->value;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }
}