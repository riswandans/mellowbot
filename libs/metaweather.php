<?php
class MetaWeather
{
    public $city, $citycode, $cityname;

    /*
    this function for request to metaweather.com
     */
    public function getcodecountry() {
        $url = "https://www.metaweather.com/api/location/search/?query=".urlencode($this->city);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        $this->citycode = $result[0]['woeid'];
        $this->cityname = $result[0]['title'];
    }

    public function getWeather() {
        $this->getcodecountry();
        $url = "https://www.metaweather.com/api/location/$this->citycode/";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.0.2 Safari/605.1.15');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result, true);
        return $result['consolidated_weather'][0]['weather_state_name'];
    }
}
