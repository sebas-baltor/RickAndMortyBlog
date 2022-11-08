<?php
class ApiConsumer {
    function Get($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        return $res = json_decode($res);
        curl_close($ch); 
    }
}