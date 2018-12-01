<?php
class Google_Translate
{
    public $word, $from, $to;

    /*
    this function for request to google translate api 
     */
    public function translate() {
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=".$this->from."&tl=".$this->to."&dt=t&q=".urlencode($this->word);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);
        return $result[0][0][0];
    }

    /* 
    this function for replace country name to country code in google translate 
     _____________________________________________________________________________________________
    |                                                                                             |
    |  Afrikaans : af   |  Irish : ga       |  Arabic : ar                   |  Japanese : ja     |
    |  Albanian : sq    |  Italian : it     |  Azerbaijani : az              |  Canada : kn       |
    |  Basque : eu      |  Korean : ko      |  Bengali : bn                  |  Latin : la        |
    |  Belarusian : be  |  Latvian : lv     |  Bulgarian : bg                |  Lithuanian : lt   |
    |  Catalan: ca      |  Macedonian : mk  |  Chinese Simplified : zh-CN    |  Malay : ms        |
    |  Maltese : mt     |  Croatian : hr    |  Chinese Traditional : zh-TW   |  Norwegian: no     |
    |  Czech : cs       |  Persian : fa     |  Danish : da                   |  Polish : pl       |
    |  Dutch : nl       |  Portuguese: pt   |  English : en                  |  Romanian : ro     |
    |  Esperanto: eo    |  Russian : ru     |  Estonian : et                 |  Serbian : sr      |
    |  Filipino : tl    |  Slovak : sk      |  Finnish : fi                  |  Slovenian : sl    |
    |  French : fr      |  Spanish : es     |  Galician : gl                 |  Swahili : sw      |
    |  Georgian : ka    |  Swedish : sv     |  German : de                   |  Tamil : ta        |
    |  Greek : el       |  Telugu : te      |  Gujarati : gu                 |  Thai : th         |
    |  Haitian : ht     |  Turkish : tr     |  Hebrew : iw                   |  Ukrainian : uk    |
    |  Hindi : hi       |  Urdu : ur        |  Hungarian : hu                |  Vietnamese : vi   |
    |  Icelandia : is   |  Welsh : cy       |  Indonesian : in               |  Yiddish : yi      |
    |                                                                                             |
    |  Auto Detect : auto                                                                         |
    |_____________________________________________________________________________________________|
    */
    public function country_name($country) {
        $country = str_replace("english","en",$country);
        $country = str_replace("japanese","ja",$country);
        $country = str_replace("arabic","ar",$country);
        $country = str_replace("afrikaans","af",$country);
        $country = str_replace("albanian","sq",$country);
        $country = str_replace("catalan","ca",$country);
        $country = str_replace("belarusian","mt",$country);
        $country = str_replace("czech","cs",$country);
        $country = str_replace("dutch","nl",$country);
        $country = str_replace("esperanto","eo",$country);
        $country = str_replace("filipino","tl",$country);
        $country = str_replace("french","fr",$country);
        $country = str_replace("georgian","ka",$country);
        $country = str_replace("greek","el",$country);
        $country = str_replace("haitian","ht",$country);
        $country = str_replace("hindi","hi",$country);
        $country = str_replace("indonesian","in",$country);
        $country = str_replace("icelandia","is",$country);
        $country = str_replace("irish","ga",$country);
        $country = str_replace("italian","it",$country);
        $country = str_replace("korean","ko",$country);
        $country = str_replace("latvian","lv",$country);
        $country = str_replace("macedonian","mk",$country);
        $country = str_replace("croatian","hr",$country);
        $country = str_replace("persian","fa",$country);
        $country = str_replace("portuguese","pt",$country);
        $country = str_replace("russian","ru",$country);
        $country = str_replace("slovak","sk",$country);
        $country = str_replace("spanish","es",$country);
        $country = str_replace("swedish","sv",$country);
        $country = str_replace("telugu","te",$country);
        $country = str_replace("turkish","tr",$country);
        $country = str_replace("urdu","ur",$country);
        $country = str_replace("welsh","cy",$country);
        $country = str_replace("azerbaijani","az",$country);
        $country = str_replace("bengali","bn",$country);
        $country = str_replace("bulgarian","bg",$country);
        $country = str_replace("chinese","zh-CN",$country);
        $country = str_replace("taiwan","zh-TW",$country);
        $country = str_replace("danish","da",$country);
        $country = str_replace("estonian","et",$country);
        $country = str_replace("finnish","fi",$country);
        $country = str_replace("galician","gl",$country);
        $country = str_replace("german","de",$country);
        $country = str_replace("gujarati","gu",$country);
        $country = str_replace("hebrew","iw",$country);
        $country = str_replace("hungarian","hu",$country);
        $country = str_replace("canada","kn",$country);
        $country = str_replace("latin","la",$country);
        $country = str_replace("lithuanian","lt",$country);
        $country = str_replace("malay","ms",$country);
        $country = str_replace("polish","pl",$country);
        $country = str_replace("romanian","ro",$country);
        $country = str_replace("serbian","sr",$country);
        $country = str_replace("slovenian","sl",$country);
        $country = str_replace("swahili","sw",$country);
        $country = str_replace("tamil","ta",$country);
        $country = str_replace("thai","th",$country);
        $country = str_replace("ukrainian","uk",$country);
        $country = str_replace("vietnamese","vi",$country); 
        $country = str_replace("yiddish","yi",$country);
        return $country;
    }
}