<?php

// PREPARO I DATI esportandoli dal file JSON ad un array
// 1. leggo dati dal file JSON e li passo a stringa
$list_string = file_get_contents('dischi.json'); // da json a string
// var_dump($list_string);

// 2. trasformo la stringa in un array
$list_array = json_decode($list_string, true); // da string a array
// var_dump($list);

// GESTISCO LA CHIAMATA API
// 3. compongo la risposta della chiamata API
$response_data = [
    "results" => $list_array,
    "success" => true
];
// var_dump($response_data);

// 4. trasformo i dati della risposta in JSON
$json_list = json_encode($response_data);
// var_dump($json_list);

// 5. imposto l'header della risposta su JSON
header("Content-Type: application/json");

// 6. invio la risposta della chiamata API
echo $json_list;
