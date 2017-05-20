<?php
$to="9487914513";
$name="hari";
$t="Name:".$name;


$url ="http://api-alerts.solutionsinfini.com/v3/?method=sms&api_key=A4d13c42b587e9f748c56aab6328c7ea9&to=$to&sender=DRTHAJ&message=$t";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$curl_scraped_page = curl_exec($ch);

curl_close($ch);
echo $curl_scraped_page;