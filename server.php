<?php

// PREPARO I DATI esportandoli dal file JSON ad un array
// 1. leggo dati dal file JSON e li passo a stringa
$disc_string = file_get_contents('dischi.json'); // da json a string
// var_dump($disc_string);

// 2. trasformo la stringa in un array
$disc_array = json_decode($disc_string, true); // da string a array
// var_dump($disc);

// GESTISCO LA CHIAMATA API
// 3. compongo la risposta della chiamata API
$response_data = [
    "results" => $disc_array,
    "success" => true
];
// var_dump($response_data);

// 4. trasformo i dati della risposta in JSON
$json_disc = json_encode($response_data);
// var_dump($json_disc);

// 5. imposto l'header della risposta su JSON
header("Content-Type: application/json");

// 6. invio la risposta della chiamata API
echo $json_disc;
