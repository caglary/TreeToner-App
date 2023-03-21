<?php
try {
    $api_url = 'https://www.tcmb.gov.tr/kurlar/today.xml'; // The URL of TCMB Exchange Rates API
    $xml = simplexml_load_file($api_url); // Load the XML file from the API URL

    // Get exchange rates for USD, EUR and GBP
    $usd_rate = $xml->Currency[0]->BanknoteBuying;
    $eur_rate = $xml->Currency[3]->BanknoteBuying;

    // // Display exchange rates on your website
    // echo '<b>USD:</b>  ' . $usd_rate . '<br>';
    // echo '<b>EUR:</b>  ' . $eur_rate . '<br>';

    $dolar = substr($usd_rate, 0, 5);
    $euro = substr($eur_rate, 0, 5);
    echo ' <h6>USD :  ' . $dolar . ' TL </h6>';
    echo ' <h6>EURO :  ' . $euro . ' TL</h6>';
} catch (\Throwable $th) {
    echo 'Döviz Kuru için Merkez Bankasına Bağlanamıyor. İnternet bağlantısını kontrol ediniz.';
}




?>